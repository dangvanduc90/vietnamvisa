<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\VisaPurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VisaPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = VisaPurpose::all();
        return view('backend.visa-purpose.list', ['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.visa-purpose.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:100',
        ]);

        VisaPurpose::create($request->all());
        Session::flash('success-visa.purpose', 'Taọ mới thành công.');
        return redirect()->route('purpose.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = VisaPurpose::findOrFail($id);
        return view('backend.visa-purpose.edit', compact('obj'));
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
        $obj = VisaPurpose::findOrFail($id);
        $obj->update($request->all());
        Session::flash('success-visa.purpose', 'Cập nhật thành công.');
        return redirect()->route('purpose.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = VisaPurpose::findOrFail($id);
        $obj->delete();
        Session::flash('success-visa.purpose', 'Xóa thành công.');
        return redirect()->route('purpose.index');
    }
}
