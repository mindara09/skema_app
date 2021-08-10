<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Customer;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.index',[
        	'customer' => Customer::all(),
        	'order' => OrderProduct::all(),
        	'payment' => Payment::orderBy('balance_paid', 'DESC'),
        	'product' => Product::all(),
        	'customerNow' => Customer::where('created_at', 'LIKE','%'.Carbon::now()->format('Y-m-d').'%')
        ]);
    }
}
