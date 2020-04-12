<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebinfoRequest as WebinfoRequest;
use App\Admin\Webinfo;
use Session;

class WebinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function commonInfo(Request $request){
        $page_name = "Thiết lập thông tin chung";
        $flag = 'thong-tin-chung';
        $_route = route('thong-tin-chung.post');
        $_form = 'info';
        $obj  = Webinfo::where('name','thong-tin-chung')->first();
        $content = null;
        if($obj != null) $content = json_decode($obj->content);
        return view('back-end.webinfo.info',['flag'=>$flag, 'page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'content'=>$content]);
    }

    public function postCommonInfo(Request $request){
        $flag = 'thong-tin-chung';
        $data = json_encode($request->only('name','hotline','email', 'address'));
        $obj  = Webinfo::where('name','thong-tin-chung')->first();
        if($obj == null) {
           $obj = Webinfo::create(['name'=>'thong-tin-chung', 'content'=>$data]);
        }else $obj->update(['content'=>$data]);
        Session::flash('success-'.$flag,'Thay đổi thiết lập thông tin chung thành công');
        return back();
    }

    public function headerInfo(Request $request){
        $page_name = "Thiết lập Header/ Footer";
        $flag = 'header';
        $_route = route('header.post');
        $_form = 'header';
        $obj  = Webinfo::where('name','header')->first();
        $content = null;
        if($obj != null) $content = json_decode($obj->content);
        return view('back-end.webinfo.info',['flag'=>$flag, 'page_name'=>$page_name, '_route'=>$_route, '_form'=>$_form, 'content'=>$content]);
    }

    public function postHeaderInfo(Request $request){
        $flag = 'header';
        $data = $request->only('logo','banner', 'link_logo', 'link_banner', 'logo_footer', 'link_logo_footer');
        if ($data['logo'] != null && $data['logo'] != "") {
            $index = strpos($data['logo'],'FILES/source/');
            if (!$index === false) {
                $data['logo'] = substr($data['logo'],$index, strlen($data['logo']));
            }
        }
        if ($data['banner'] != null && $data['banner'] != "") {
            $index = strpos($data['banner'],'FILES/source/');
            if (!$index === false) {
                $data['banner'] = substr($data['banner'],$index, strlen($data['banner']));
            }
        }

        if ($data['logo_footer'] != null && $data['logo_footer'] != "") {
            $index = strpos($data['logo_footer'],'FILES/source/');
            if (!$index === false) {
                $data['logo_footer'] = substr($data['logo_footer'],$index, strlen($data['logo_footer']));
            }
        }

        $data = json_encode($data);
        $obj  = Webinfo::where('name','header')->first();
        if($obj == null) {
           $obj = Webinfo::create(['name'=>'header', 'content'=>$data]);
        }else $obj->update(['content'=>$data]);
        Session::flash('success-'.$flag,'Thay đổi thiết lập thông tin header thành công');
        return back();
    }

    public function menu(Request $request){
        $page_name = "Thiết lập menu";
        $flag = 'menu';
        return view('back-end.webinfo.menu',['flag'=>$flag, 'page_name'=>$page_name]);
    }







    public function index()
    {
        $objs = Webinfo::all();
        return view('back-end.webinfo.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.webinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebinfoRequest $request)
    {
        Webinfo::create($request->all());
        Session::flash('success-webinfo', 'Tạo mới thông tin website "'.$request->name.'" thành công.');
        return redirect(route('webinfo.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Webinfo::find($id);
        if($obj == null){
            Session::flash('error-webinfo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('webinfo.index');  
        }
        return view('back-end.webinfo.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $obj = Webinfo::find($id);
        if($obj == null){
            Session::flash('error-webinfo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('webinfo.index');  
        }
        $obj->update($request->all());
        Session::flash('success-webinfo', 'Thay đổi thông tin thành công.');
        return redirect(route('webinfo.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Webinfo::find($id);
        if($obj == null){
            Session::flash('error-webinfo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('webinfo.index');  
        }
        $obj->delete();
        Session::flash('success-webinfo', 'Xóa thông tin thành công.');  
        return redirect()->route('webinfo.index');  
    }

    public function mutileUpdate(Request $request)
    {
        $status = $request->status;
        $data = $request->data_selected;
        $data = explode(",", $data[0]);
        if($status != 2)
        {
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Webinfo::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Webinfo::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-webinfo', 'Update đồng loạt thành công.');
        return redirect()->route('webinfo.index');
    }
}
