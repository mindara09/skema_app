<?php

namespace App\Http\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customer;

class Unpaid extends Component
{
    public function render()
    {
        return view('livewire.admin.customers.unpaid',[
        	'unpaid' => Customer::where('status', 'unpaid')->get()
        ]);
    }
}
