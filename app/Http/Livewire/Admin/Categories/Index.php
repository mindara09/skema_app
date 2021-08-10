<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Categories;
use App\Models\IconCoffee;

class Index extends Component
{
	public $name_category, $icon_id, $selected_id;
	public $updatedMode = false;

	protected $rules = [
        'icon_id' => 'required',
		'name_category' => 'required'
	];

    public function render()
    {
        return view('livewire.admin.categories.index',[
        	'items' => Categories::all(),
            'icons' => IconCoffee::all(),
            'icon_update' => IconCoffee::all(),

        ]);
    }

    public function save()
    {
    	$this->validate();
    	Categories::create($this->validate());

    	session()->flash('berhasil','Add Data Category Successfully!');
    	$this->resetInput();
    }

    public function resetInput()
    {
    	$this->name_category = null;
    }

    public function edit($id)
    {
    	$find = Categories::find($id);
    	$this->selected_id = $id;
    	$this->name_category = $find->name_category;
        $this->icon_id = $find->icon_id;
    	$this->updatedMode = true;
    }

    public function update()
    {
    	if ($this->selected_id) {
    		$find = Categories::find($this->selected_id);
    		$find->update([
                'icon_id' => $this->icon_id,
    			'name_category' => $this->name_category
    		]);

    		$this->resetInput();
    		$this->updatedMode = false;
    		session()->flash('berhasil','Update Data Category Successfully!');
    		$this->emit('updateData');
    	}
    }

    public function destroy($id)
    {
    	$delete = Categories::where('id', $id);
    	$delete->delete();

    	session()->flash('hapus','Delete Data Categories Successfully');
    }

}
