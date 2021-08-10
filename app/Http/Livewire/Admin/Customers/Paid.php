<?php

namespace App\Http\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customer;

class Paid extends Component
{
    public function render()
    {
        return view('livewire.admin.customers.paid',[
        	'paid' => Customer::where('status', 'paid')->get()
        ]);
    }
}
