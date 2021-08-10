<?php

namespace App\Http\Livewire\Home\Menu;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\IconCoffee;

class Index extends Component
{

	public $product_id, $quantity, $price;
	public $customer_id, $customer_name, $customer_email, $customer_phone;


	protected $rules = [
		'product_id' => '',
		'quantity' => 'required',
		'price' => ''
 	];

    public function mount($customer)
    {
        $this->customer_id = $customer->id;
        $this->customer_name = $customer->name;
        $this->customer_email = $customer->email;
        $this->customer_phone = $customer->phone;
    }

    public function render()
    {

        $this->emit('save_order');

        $sub_total = OrderProduct::where('customer_id', $this->customer_id)->pluck('price')->sum();
        $ppn = OrderProduct::where('customer_id', $this->customer_id)->pluck('price')->sum() * 10 / 100;
        return view('livewire.home.menu.index',[
        	'categories' => Categories::all(),
        	'category' => Categories::all(),
        	'products' => Product::all(),
        	'order' => OrderProduct::all(),
            'sub_total' => $sub_total,
            'ppn' => $ppn,
            'total' => $sub_total + $ppn,
            'icons' => IconCoffee::all()

        ]);
    }


    public function save_order($id, $price, $customer_id)
    {

        $find = OrderProduct::where('product_id', $id)->where('customer_id', $this->customer_id)->where('status', 'pending')->first();

        if (!$find) {
            $order = new OrderProduct;
            $order->product_id = $id;
            $order->customer_id = $this->customer_id;
            $order->quantity = $this->quantity;
            $order->price = $price * $this->quantity;
            $order->status = "pending";
            $order->save();

            session()->flash('berhasil','Add Order Successfully!');
        } elseif ($find) {
            $find->update([
                'quantity' => $find->quantity + $this->quantity,
            ]);
            $find->update([
                'price' => $price * $find->quantity
            ]);

            session()->flash('berhasil','Add Order Successfully!!');
        }

        $this->quantity = null;

    }

    public function destroy_order($id)
    {
        $delete = OrderProduct::find($id);

        $delete->delete();

        session()->flash('hapus','Delete Order Successfully');
    }

    public function order($customer_id, $total)
    {
        $update = OrderProduct::where('customer_id', $customer_id);
        $update->update([
            'status' => "success"
        ]);

        
        $payment = new Payment;
        $payment->id_receipt = 'S'.$this->customer_phone;
        $payment->customer_id = $customer_id;
        $payment->balance_paid = $total;
        $payment->save();
        

        return redirect('/success');
    }

}
