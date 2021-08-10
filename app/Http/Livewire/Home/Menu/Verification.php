<?php

namespace App\Http\Livewire\Home\Menu;

use Livewire\Component;
use App\Models\Customer;

class Verification extends Component
{
	public $phone;
	protected $queryString = ['phone'];
    public function render()
    {
        return view('livewire.home.menu.verification',[
        	'customers' => Customer::all()
        ]);
    }

    public function find_customer()
    {
    	$customer = Customer::where('phone', $this->phone)->first();

    	if ($customer) {
    		session()->flash('berhasil','Your Data Has Been Verified!');
    		return redirect()->to('/menu/'.$customer->phone.'?#');	
    	}
    	session()->flash('gagal','Your Data Has Not Verified!');

    	

    }


}
