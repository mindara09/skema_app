<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;

class Create extends Component
{
	public $name_category;
    public function render()
    {
        return view('livewire.admin.categories.create');
    }
}
