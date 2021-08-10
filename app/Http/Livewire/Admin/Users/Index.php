<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Ramsey\Uuid\Uuid;
use App\User;

class Index extends Component
{
	public $role, $username, $password, $selected_id;
	public $updatedMode = false;

	protected $rules = [
		'username' => 'required',
		'password' => 'required'
	];

    public function render()
    {
        return view('livewire.admin.users.index',[
        	'items' => User::all()
        ]);
    }

    public function save()
    {
    	$this->validate();

    	$input = new User;
    	$input->role = 'superuser';
    	$input->username = $this->username;
    	$input->password = bcrypt($this->password);
    	$input->save();

    	session()->flash('berhasil','Add User Successfully!');
    	$this->resetInput();
    }

    public function resetInput()
    {
    	$this->role = null;
    	$this->username = null;
    	$this->password = null;
    }

    public function edit($id)
    {
    	$find = User::find($id);

    	$this->selected_id = $id;
    	$this->role = $find->role;
    	$this->username = $find->username;

    	$updatedMode = true;
    }

    public function update()
    {
    	$find = User::find($this->selected_id);
    	if ($this->password == null) {

    		$find->update([
    			'username' => $this->username,
    		]);

    		session()->flash('berhasil','Update Data User Successfully');
    		$this->resetInput();
    		$updatedMode = false;
    		$this->emit('updatedMode');
    	}
    	else{
    		$find->update([
    			'role' => $this->role,
    			'username' => $this->username,
    			'password' => bcrypt($this->password)
    		]);

    		session()->flash('berhasil','Update Data User Successfully');
    		$this->resetInput();
    		$updatedMode = false;
    		$this->emit('updatedMode');
    	}
    }

    public function destroy($id)
    {
    	$delete = User::find($id);
    	$delete->delete();

    	session()->flash('hapus', 'Delete Data User Successfully');
    }


}
