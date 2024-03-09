<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserEdit extends Component
{

    public $id;

    #[Validate]
    public $name, $email;

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:100',
        ];
    }

    public function mount(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $user = User::find($this->id)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('status', 'User successfully edited.');

        return $this->redirectRoute('users.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.user.user-edit');
    }
}
