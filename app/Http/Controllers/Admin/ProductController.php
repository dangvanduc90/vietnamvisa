<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest as PostRequest;
use App\Admin\Post;
use App\Admin\Category;
use App\Admin\Seo;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Post::join('categories', 'categories.id', '=', 'posts.cat_id')->where('categories.type2', 1)->select('posts.*')->get();
        return view('backend.product.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('type2',1)->where('status',1)->orderby('name')->get();
        return view('backend.product.create',['cats'=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $arr_data = $request->all();
        $arr_data['type2'] = 1;
        $obj = Post::create($arr_data);
        $arr_data['type'] = 3;
        $arr_data['obj_id'] = $obj->id;
        Seo::create($arr_data);
        Session::flash('success-product', 'Tạo mới sản phẩm thành công.');
        return redirect()->route('product.create');
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
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('product.index');
        }
        $cat = Category::where('type2',1)->where('status',1)->orderby('name')->get();
        return view('backend.product.edit',['obj'=>$obj,'cats'=>$cat]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('product.index');
        }
        $data = $request->all();
        $obj->update($request->all());
        $data['type'] = 3;
        $data['obj_id'] = $obj->id;
        $seo = $obj->seo();
        if($seo != null) $seo->update($data);
        else Seo::create($data);
        Session::flash('success-product', 'Cập nhật sản phẩm thành công.');
        return redirect()->route('product.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('product.index');
        }
        $seo = $obj->seo();
        if($seo != null) $seo->delete();
        $obj->delete();
        Session::flash('success-product', 'Xóa bài viết thành công.');
        return redirect()->route('product.index');
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
                $obj = Post::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Post::find($data[$i]);
                if($obj != null)
                {
                    $seo = $obj->seo();
                    if($seo != null) $seo->delete();
                    $obj->delete();
                }
            }
        }
        Session::flash('success-product', 'Update đồng loạt thành công.');
        return redirect()->route('product.index');
    }
}
