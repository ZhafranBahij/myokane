<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Layout('layouts.app')]

    public function delete(Permission $permission)
    {
        $permission->delete();

        session()->flash('status', 'Permission succesfully deleted');
    }

    public function render()
    {
        $permissions = Permission::query()
                        ->latest()
                        ->paginate(10);

        return view('livewire.admin.permission.permission-index', [
            'permissions' => $permissions,
        ]);
    }
}
