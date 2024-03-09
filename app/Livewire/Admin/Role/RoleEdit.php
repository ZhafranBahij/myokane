<?php

namespace App\Livewire\Admin\Role;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{

    public $id;

    #[Validate()]
    public $name, $permissions, $permissionSelected = [];

    public function mount(Role $role)
    {
        $this->permissions = Permission::all();
        $this->name = $role->name;
        $this->id = $role->id;
        $this->permissionSelected = $role->getPermissionNames();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:4|max:100',
            'permissionSelected' => 'required',
        ];
    }

    public function save()
    {
        $this->validate();

        $role = Role::find($this->id);

        $role->update([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->permissionSelected);

        session()->flash('status', 'Role successfully created.');
        return $this->redirectRoute('roles.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.role.role-edit');
    }
}
