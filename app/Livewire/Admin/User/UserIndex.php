<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    // public $users;
    public $search;

    public function delete(User $user){
        $user->delete();

        session()->flash('status', 'User succesfully deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $users = User::query()
                    ->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                    ->paginate(10);

        return view('livewire.admin.user.user-index', ['users' => $users]);
    }
}
