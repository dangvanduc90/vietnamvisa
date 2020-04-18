<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\VisaPurpose;
use App\Models\Admin\VisaUrgent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UrgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = VisaUrgent::all();
        $purposes = VisaPurpose::all();
        return view('backend.visa-urgent.list', ['data'=>$objs, 'purposes' => $purposes]);
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
            'day_text' => 'required|max:255',
            'day_number' => 'required',
            'fee' => 'required',
            'purpose_id' => 'required|integer|min:0',
        ]);

        VisaUrgent::create($request->all());
        Session::flash('success-visa.urgent', 'Taọ mới thành công.');
        return redirect()->route('urgent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = VisaUrgent::findOrFail($id);
        $obj->delete();
        Session::flash('success-visa.urgent', 'Xóa thành công.');
        return redirect()->route('urgent.index');
    }
}
