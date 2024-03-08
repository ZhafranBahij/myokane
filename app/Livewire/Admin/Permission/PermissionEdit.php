<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{

    public $id;

    #[Validate]
    public $name;

    public function mount(Permission $permission)
    {
        $this->id = $permission->id;
        $this->name = $permission->name;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:4|max:100',
        ];
    }

    public function save()
    {
        $this->validate();

        $permission = Permission::find($this->id)->update([
            'name' => $this->name,
        ]);

        session()->flash('status', 'Permission successfully edited.');
        return $this->redirectRoute('permissions.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.permission.permission-edit');
    }
}
