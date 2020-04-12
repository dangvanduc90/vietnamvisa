<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Contact;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Contact::orderby('created_at','desc')->get();
        return view('back-end.contact.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return back();
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
        $obj = Contact::find($id);
        if($obj == null){
            Session::flash('error-contact', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('contact.index');  
        }
        return view('back-end.contact.edit',['obj'=>$obj]);
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
        $obj = Contact::find($id);
        if($obj == null){
            Session::flash('error-contact', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('contact.index');  
        }
        $obj->update($request->all());
        Session::flash('success-contact', 'Thay đổi thông tin thành công.');
        return redirect(route('contact.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Contact::find($id);
        if($obj == null){
            Session::flash('error-contact', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('contact.index');  
        }
        $obj->delete();
        Session::flash('success-contact', 'Xóa thông tin thành công.');  
        return redirect()->route('contact.index');  
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
                $obj = Contact::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Contact::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-contact', 'Update đồng loạt thành công.');
        return redirect()->route('contact.index');
    }
}
