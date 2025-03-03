<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use MongoDB\Driver\Session;

use function Flasher\Prime\flash;

class Clicker extends Component
{
use WithPagination;
    public $name;
    public $email;
    public $password;
    public $search="";
    public $editingId;
    #[Rule('required|min:2|max:20')]
    public $editingName;
    #[Rule('required|email|unique:users,email')]
    public $editingEmail;


public function createUser()
{
$this->validate([
    'name' => 'required|min:2|max:20',
    'email'=>'required|email|unique:users,email',
    'password'=>'required|min:5'
]);
User::create([
    "name" => $this->name,
    "email" => $this->email,
    "password" => $this->password,
]);
flash()->success('Utilisateur cree');
   // session()->flash('success','Utilisateur ajouté avec succes');

$this->reset('name', 'email', 'password');
}


public function editUser($id){
    $user=User::find($id);
    $this->editingId = $id;
    $this->editingName = $user->name;
    $this->editingEmail = $user->email;

}
public function cancelEdit(){
    
    flash()->success('Modification annulée');

    $this->editingId = null;
}

public function updateUser(){
 $this->validateOnly('editingName');
 $this->validateOnly('editingEmail');
    $user=User::find($this->editingId)->update([
        "name" => $this->editingName,
        "email" => $this->editingEmail,
    ]);
    flash()->success('Utilisateur modifié');
    //session()->flash('success','Utilisateur modifié avec succes');
    $this->reset('editingId','editingName', 'editingEmail');

}

public function deleteUser($id){

    User::destroy($id);
    flash()->warning('Utilisateur supprimé');
   // session()->flash('success','Utilisateur supprimer avec succes');
    $this->resetPage();
}

public function toggleCheck($toggleId){

    $user=User::find($toggleId);
   $user->is_checked=!$user->is_checked;
   $user->save();
}

    public function render()
    {
        $users=User::where('name','like',"%$this->search%")->latest()->paginate(5);
       
        return view('livewire.clicker',[
            'users' => $users,
        ]);
    }

}
