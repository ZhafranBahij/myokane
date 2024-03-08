<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $id;

    #[Validate()]
    public $name, $email;

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:100',
        ];
    }

    public function mount()
    {
        $user = auth()->user();

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

        return $this->redirectRoute('home', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user.profile-edit');
    }
}
