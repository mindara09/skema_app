<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function reservasi()
    {
        $dateNow = Carbon::now();
        $customer = Customer::all();

    	return view('reservasi', compact('dateNow','customer'));
    }

    public function menu($phone)
    {

        $customer = Customer::where('phone', $phone)->first();

        if ($customer) {
            return view('menu', compact('customer'));
        }
        else {
            return redirect()->back()->with('gagal','Yout number verification not found!');
        }
    	
    }

    public function verif()
    {
        return view('verification');
    }

    public function success()
    {
        return view('success');
    }
}
