<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $name;
    public $email;
    public $userId;

    public function render()
    {
        return view('livewire.pages.admin.edit-user', ['name' => $this->name, 'email' => $this->email]);
    }

    public function mount($id)
    {
        $user = User::findOrFail($id);
        if (!auth()->user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        }
        $this->name  = $user->name;
        $this->email = $user->email;
        $this->userId = $user->id;
    }

    public function editUser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$this->userId,
        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'User edit successfully');
    }
}