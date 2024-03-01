<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserIndex extends Component
{

    public $users;

    #[Layout('layouts.app')]
    public function render()
    {

        $this->users = User::all();

        return view('livewire.admin.user.user-index');
    }
}
