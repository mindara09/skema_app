<?php

namespace App\Http\Livewire\Admin\PromotionProducts;

use Livewire\Component;
use App\Models\DiscountProduct;
use App\Models\Categories;
use App\Models\Product;

class Index extends Component
{
	public $product_id, $discount, $selected_id;
	public $updatedMode = false;

	protected $rules = [
		'product_id' => 'numeric|required',
		'discount' => 'numeric|required'
	];
    public function render()
    {
        return view('livewire.admin.promotion-products.index',[
        	'items' => DiscountProduct::all(),
        	'category' => Categories::all(),
        	'product' => Product::all()
        ]);

    }

    public function save()
    {
    	$this->validate();

    	$input = new DiscountProduct;
    	$input->product_id = $this->product_id;
    	$input->discount = $this->discount;
    	$input->save();

    	session()->flash('berhasil','Add Data Discount Successfully!');

    	$this->resetInput();
    }

    public function resetInput()
    {
    	$this->product_id = null;
    	$this->discount = null;
    }

    public function edit($id)
    {
    	$find = DiscountProduct::find($id);

    	$this->selected_id = $id;
    	$this->product_id = $find->product_id;
    	$this->discount = $find->discount;

    	$this->updatedMode = true;

    }

    public function update()
    {
    	if ($this->selected_id) {
    		
    		$this->validate();

    		$find = DiscountProduct::find($this->selected_id);

    		$find->product_id = $this->product_id;
    		$find->discount = $this->discount;
    		$find->save();

    		session()->flash('berhasil','Update Data Discount Successfully!');
    		$this->updatedMode = false;
    	}
    }

    public function destroy($id)
    {
    	$delete = DiscountProduct::find($id);
    	$delete->delete();

    	session()->flash('hapus','Delete Data Product Successfully');
    }
}
