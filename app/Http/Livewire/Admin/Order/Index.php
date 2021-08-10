<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Payment;
use App\Models\OrderProduct;
use App\Models\Customer;
use App\Models\Product;

class Index extends Component
{
	public $search, $amount_pay;

	protected $queryString = ['search'];

    public function render()
    {
    	$search = '%'.$this->search.'%';
        return view('livewire.admin.order.index',[
        	'order' => OrderProduct::all(),
        	'payment' => Payment::where('id_receipt', 'like', $search)->get(),
        	'payments' => Payment::all(),
        	'customer' => Customer::all(),
        	'products' => Product::all()
        ]);
    }

    public function find_receipt()
    {
    	$payment = Payment::where('id_receipt', $this->search)->first();

    	return view('livewire.admin.order.index', compact('payment'));
    }

    public function save($id, $customer_id)
    {
    	$find = Payment::find($id);

    	$find->update([
    		'amount_pay' => $this->amount_pay,
    		'money_change' => $this->amount_pay - $find->balance_paid 
    	]);

    	$update = Customer::where('id', $customer_id);
    	$update->update([
    		'status' => 'paid'
    	]);

    	$this->amount_pay = null;

    	session()->flash('berhasil', 'Payment Successfully');
    }
}
