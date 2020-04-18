<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\VisaMonth;
use App\Models\Admin\VisaStamping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StampingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = VisaStamping::all();
        $visaMonth = VisaMonth::all();
        return view('backend.visa-stamping.list', ['data'=>$objs, 'visaMonth' => $visaMonth]);
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
            'fee' => 'required',
            'month_id' => 'required|integer|min:0',
        ]);

        VisaStamping::create($request->all());
        Session::flash('success-visa.stamping', 'Taọ mới thành công.');
        return redirect()->route('stamping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = VisaStamping::findOrFail($id);
        $obj->delete();
        Session::flash('success-visa.stamping', 'Xóa thành công.');
        return redirect()->route('stamping.index');
    }
}
