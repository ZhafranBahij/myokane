<?php

namespace App\Livewire\Admin\Role;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Layout('layouts.app')]
    public function render()
    {

        $roles = Role::query()
                    ->paginate(10);

        return view('livewire.admin.role.role-index', [
            'roles' => $roles,
        ]);
    }
}
