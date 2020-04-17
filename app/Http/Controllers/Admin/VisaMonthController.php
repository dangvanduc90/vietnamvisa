<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\VisaMonth;
use App\Models\Admin\VisaPurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VisaMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = VisaMonth::all();
        return view('backend.visa-month.list', ['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purposes = VisaPurpose::all();
        return view('backend.visa-month.create', compact('purposes'));
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
            'month_text' => 'required|max:255',
            'month_number' => 'required|integer|min:0|max:127',
            'purpose_id' => 'required|integer|min:0',
        ]);

        VisaMonth::create($request->all());
        Session::flash('success-visa.month', 'Taọ mới thành công.');
        return redirect()->route('month.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = VisaMonth::findOrFail($id);
        $purposes = VisaPurpose::all();
        return view('backend.visa-month.edit', compact('obj', 'purposes'));
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
        $obj = VisaMonth::findOrFail($id);
        $obj->update($request->all());
        Session::flash('success-visa.month', 'Cập nhật thành công.');
        return redirect()->route('month.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = VisaMonth::findOrFail($id);
        $obj->delete();
        Session::flash('success-visa.month', 'Xóa thành công.');
        return redirect()->route('month.index');
    }
}
