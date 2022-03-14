<?php

namespace App\Http\Livewire;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Permissions extends Component
{
    public $permissions, $state = [], $permission_id;
    public $updateMode = false;
    public $createMode = false;

    public function mount()
    {

    }

    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.permissions')->with('id');
    }

    public function create()
    {
        $this->createMode = true;
        $this->dispatchBrowserEvent('hide-alert-warning'); //working code
        // $this->emit('anything');
    }

    public function store()
    {
        Validator::make($this->state, [
            'name' => ['required', 'unique:permissions,name'],
        ])->validate();
        $input = $this->state;
        $permission = Permission::create($input);
        $this->createMode = false;
        $this->dispatchBrowserEvent('hide-alert-warning');
        $this->dispatchBrowserEvent('initializeDataTable', ['table' => 'Permission']);
        $this->resetInputFields();
        session('message','Permission created successfully');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->state['permission_id'] = $permission->id;
        $this->state['name'] = $permission->name;
        $this->updateMode = true;
        $this->dispatchBrowserEvent('hide-alert-warning');
    }

    public function update($id)
    {
        Validator::make($this->state, [
            'name' => ['required', 'unique:permissions,name,'.$id],
        ])->validate();
        $permission = Permission::find($this->state['permission_id']);
        $input = $this->state;
        $permission->update($input);
        $this->updateMode = false;
        $this->dispatchBrowserEvent('hide-alert-warning');
        $this->resetInputFields();
        session()->flash('message', 'Permission updated successfully');
        $this->dispatchBrowserEvent('initializeDataTable', ['table' => 'Permission', notifyMsg('success', 'Permission updated successfully')]);
    }

    private function resetInputFields()
    {
        $this->state['name'] = '';
        $this->state['permission_id'] = '';
    }



}
