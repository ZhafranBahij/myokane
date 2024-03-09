<?php

namespace App\Livewire\Admin\Role;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    #[Validate]
    public $name, $permissions, $permissionSelected = [];

    public function mount()
    {
        $this->permissions = Permission::all();
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
        // dd($this->permissionSelected);
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->permissionSelected);

        session()->flash('status', 'Role successfully created.');
        return $this->redirectRoute('roles.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.role.role-create');
    }
}
