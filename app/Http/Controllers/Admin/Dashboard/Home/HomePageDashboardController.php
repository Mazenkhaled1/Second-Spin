<?php

namespace App\Http\Controllers\Admin\Dashboard\Home;

use App\Http\Controllers\Controller;


class HomePageDashboardController extends Controller
{
    public function index() 
    {
        return view('Admin.index') ;
    }
}
