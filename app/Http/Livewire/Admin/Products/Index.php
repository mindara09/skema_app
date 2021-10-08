<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Categories;
use Livewire\WithFileUploads;

class Index extends Component
{
	use WithFileUploads;

	public $category_id, $photo, $name_product, $status, $price, $description, $discount, $percent, $selected_id;
	public $updatedMode = false;

	protected $rules = [
		'category_id' => 'required',
		'photo' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
		'name_product' => 'required',
		'price' => 'numeric',
		'description' => 'required',
        'discount' => '',
        'percent' => ''
	];

    public function render()
    {
        return view('livewire.admin.products.index',[
        	'items' => Product::all(),
        	'category' => Categories::all()
        ]);
    }

    public function save()
    {
    	$this->validate();

    	$valid = $this->validate();
    	$valid['photo'] = $this->photo->storeAs('img/products', $this->photo->getClientOriginalName(), 'public');

    	$input = new Product;
    	$input->category_id = $this->category_id;
    	$input->photo = $this->photo->getClientOriginalName();
    	$input->name_product = $this->name_product;
        $input->status = "available";
    	$input->price = $this->price;
    	$input->description = $this->description;
        $input->discount = $this->discount;
    	$input->save();



    	session()->flash('berhasil','Add Data Product Successfully!');
    	$this->resetInput();
    	$this->emit('addData');
    }

    public function resetInput()
    {
    	$this->category_id = null;
    	$this->photo = null;
    	$this->name_product = null;
    	$this->price = null;
    	$this->description = null;
        $this->discount = null;
    }

    public function edit($id)
    {
    	$find = Product::find($id);

    	$this->selected_id = $id;
    	$this->category_id = $find->category_id;
    	$this->photo = $find->photo;
    	$this->name_product = $find->name_product;
    	$this->price = $find->price;
    	$this->description = $find->description;
        $this->discount = $find->discount;

    	$photo = $find->photo;
    	$updatedMode = true;
    }

    public function update()
    {
    	if ($this->selected_id) {

    		$find = Product::find($this->selected_id);
    		$find->update([
    			'category_id' => $this->category_id,
    			'name_product' => $this->name_product,
    			'price' => $this->price,
    			'description' => $this->description,
                'discount' => $this->discount,
    		]);

    		$this->resetInput();
    		$this->updatedMode = false;
    		session()->flash('berhasil','Update Data Product Successfully!');
    		$this->emit('updateData');
    	}
    }

    public function update_image()
    {
        if($this->selected_id)
        {
            $this->validate();

            $valid = $this->validate();
            $valid['photo'] = $this->photo->storeAs('img/products', $this->photo->getClientOriginalName(), 'public');

            $find = Product::find($this->selected_id);
            $find->update([
                'photo' => $this->photo->getClientOriginalName()
            ]);

            $this->resetInput();
            $this->updatedMode = false;
            session()->flash('berhasil','Update Image Product Successfully!');
            $this->emit('updateData');

        }
        
    }

    public function destroy($id)
    {
    	$delete = Product::find($id);
    	$delete->delete();

    	session()->flash('hapus','Delete Data Product Successfully');
    }

    public function status_stock($id, $status){

        if ($status == "available") {
            $update = Product::find($id);
            $update->update([ 'status' => 'empty']);
            
            session()->flash('hapus','Out of Stock');
        }
        elseif( $status == "empty"){
            $update = Product::find($id);
            $update->update([ 'status' => 'available']);

            
            session()->flash('berhasil','Stock Available');
        }

    }
}
