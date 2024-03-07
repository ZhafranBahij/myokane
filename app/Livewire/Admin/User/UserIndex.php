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

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function delete(User $user){
        $user->delete();

        session()->flash('status', 'User succesfully deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {

        $authorization = auth()->user()->hasPermissionTo('view user');
        if (! $authorization) {
            return view('livewire.admin.forbidden');
        }

        $users = User::query()
                    ->whereAny([
                        'name',
                        'email',
                    ], 'LIKE', '%'.$this->search.'%')
                    ->paginate(10);

        return view('livewire.admin.user.user-index', ['users' => $users]);
    }
}
