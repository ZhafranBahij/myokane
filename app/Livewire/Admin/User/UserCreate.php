<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserCreate extends Component
{
    #[Validate]
    public $name, $email, $password;

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:100',
            'password' => 'required|min:8|max:100',
        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $user->assignRole('user');

        session()->flash('status', 'User successfully created.');
        return $this->redirectRoute('users.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $authorization = auth()->user()->hasPermissionTo('create user');
        if (! $authorization) {
            return view('livewire.admin.forbidden');
        }

        return view('livewire.admin.user.user-create');
    }
}
