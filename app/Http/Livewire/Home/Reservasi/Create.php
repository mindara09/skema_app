<?php

namespace App\Http\Livewire\Home\Reservasi;

use Livewire\Component;
use App\Models\Customer;
use Carbon\Carbon;

class Create extends Component
{
	public $name, $phone, $email, $schedule;

	protected $rules = [
		'name' => 'required',
		'phone' => 'required|numeric',
		'email' => 'required|email',
        'schedule' => 'required'
	];
    public function render()
    {
        return view('livewire.home.reservasi.create');
    }

    public function save()
    {
        $validSchedule = Customer::where('schedule', $this->schedule)->count();


        if ($validSchedule == 25 && Customer::where('created_at', 'LIKE', '%'. Carbon::now()->format('Y-m-d').'%')->count() == 200)
        {

            session()->flash('gagal', 'Table is full! change list hour to another hour');
        } else {
            $this->validate();

            $input = new Customer;
            $input->name = $this->name;
            $input->email = $this->email;
            $input->phone = $this->phone;
            $input->no_table = "0";
            $input->status = "unpaid";
            $input->schedule = $this->schedule;
            $input->save();

            return redirect()->to('/verif');
        }
    	
    }
}
