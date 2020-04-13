<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Page;
use App\Admin\Category;
use App\Admin\Post;
use App\Admin\Contact;
use Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }

  }
