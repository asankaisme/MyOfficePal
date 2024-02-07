<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageUsers extends Component
{

    use WithPagination;

    public $name = '';

    public $email = '';

    public $password = '';

    public $search;

    public function render()
    {
        $users = User::where('name','like',"%{$this->search}%")->where('isActive', 1)->paginate(5);

        return view('livewire.manage-users', compact('users'));
    }

    public function addUser(){
        $validated = $this->validate([
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:Users',
        ]);

        $userExist = User::where('email', $this->email)->first();
        
        if($userExist != null){
            session()->flash('userExist', 'This email is already registered. Try different one.');
            return redirect()->route('manageUsers');
        }else{
            $success =User::create([
                'email' => $validated['email'],
                'name' => $validated['name'],
                'password' => Hash::make('password'),
            ]);
            if($success != null){
                $this->reset('name', 'email');
                session()->flash('msgSuccess', 'User added successfully.');
                return redirect()->route('manageUsers');
            }else{
                session()->flash('msgFailed', 'Failed to add user!');
                return redirect()->route('manageUsers');
            }
            

        }

    }

    public function delete($id){
        //dd($id);
        if(Auth::user()->id == $id){
            session()->flash('selfDelete', 'Are you joking me? Why do you delete yourself?');
            return redirect()->route('manageUsers');
        }
        $user = User::where('id', $id)->first();
        $user->isActive = 0;
        $user->save();
        session()->flash('deleteSuccess', 'User deleted successfully.');
        return redirect()->route('manageUsers');
    }
}
