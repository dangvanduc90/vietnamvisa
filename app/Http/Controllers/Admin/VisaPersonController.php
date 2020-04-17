<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\VisaMonth;
use App\Models\Admin\VisaPerson;
use App\Models\Admin\VisaPurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VisaPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = VisaPerson::all();
        return view('backend.visa-person.list', ['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visaMonth = VisaMonth::all();
        $visaPurpose = VisaPurpose::all();
        return view('backend.visa-person.create', compact('visaMonth', 'visaPurpose'));
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
            'person_text' => 'required|max:255',
            'person_number' => 'required|numeric',
            'person_fee' => 'required|integer|min:0',
            'month_id' => 'required|integer|min:0',
            'urgent_id' => 'required|integer|min:0',
        ]);

        VisaPerson::create($request->all());
        Session::flash('success-visa.person', 'Taọ mới thành công.');
        return redirect()->route('person.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = VisaPerson::findOrFail($id);
        $visaMonth = VisaMonth::all();
        $visaPurpose = VisaPurpose::all();
        return view('backend.visa-person.edit', compact('obj', 'visaMonth', 'visaPurpose'));
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
        $request->validate([
            'person_text' => 'required|max:255',
            'person_number' => 'required|numeric',
            'person_fee' => 'required|integer|min:0',
            'month_id' => 'required|integer|min:0',
            'urgent_id' => 'required|integer|min:0',
        ]);
        $obj = VisaPerson::findOrFail($id);
        $obj->update($request->all());
        Session::flash('success-visa.person', 'Cập nhật thành công.');
        return redirect()->route('person.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = VisaPerson::findOrFail($id);
        $obj->delete();
        Session::flash('success-visa.person', 'Xóa thành công.');
        return redirect()->route('person.index');
    }
}
