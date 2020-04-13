<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest as CategoryRequest;
use App\Admin\Category;
use App\Admin\Seo;
use Session;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Category::where('type2',1)->get();
        return view('backend.category-product.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('type2',1)->where('status',1)->get();
        return view('backend.category-product.create',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['type2'] = 1;
        $obj = Category::create($data);
        $data['type'] = 2;
        $data['obj_id'] = $obj->id;
        Seo::create($data);
        Session::flash('success-category-product', 'Tạo mới danh mục "'.$request->name.'" thành công.');
        return redirect(route('category-product.create'));
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
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category-product.index');
        }
        $cats = Category::where('type2',1)->where('status',1)->get();
        return view('backend.category-product.edit',['obj'=>$obj,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category-product.index');
        }
        $data = $request->all();
        $obj->update($request->all());
        $data['type'] = 2;
        $data['obj_id'] = $obj->id;
        $seo = $obj->seo();
        if($seo != null) $seo->update($data);
        else Seo::create($data);
        Session::flash('success-category-product', 'Thay đổi thông tin thành công.');
        return redirect(route('category-product.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category-product.index');
        }
        $seo = $obj->seo();
        if($seo != null) $seo->delete();
        $obj->delete();
        Session::flash('success-category-product', 'Xóa thông tin thành công.');
        return redirect()->route('category-product.index');
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
                $obj = Category::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Category::find($data[$i]);
                if($obj != null)
                {
                    $seo = $obj->seo();
                    if($seo != null) $seo->delete();
                    $obj->delete();
                }
            }
        }
        Session::flash('success-category-product', 'Update đồng loạt thành công.');
        return redirect()->route('category-product.index');
    }
}
