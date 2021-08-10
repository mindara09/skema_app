<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {
        
        return view('admin.dashboard');
    }

    public function order()
    {
        return view('admin.order');
    }

    public function categories()
    {
        return view('admin.categories');
    }
    
    public function products()
    {
    	return view('admin.products');
    }

    public function discount_product()
    {
        return view('admin.discount_product');
    }

    public function customers()
    {
        return view('admin.customers');
    }

    public function users()
    {
        return view('admin.users');
    }

}
