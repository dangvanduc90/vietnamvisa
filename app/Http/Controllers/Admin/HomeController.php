<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function adminHome(){
    	return view('back-end.pages.home');
    }

    public function createSlug(Request $request)
    {
    	$slug = Str::slug($request->input('str'), '-');
        return response()->json(array('slug'=>$slug), 200);
    }
}
