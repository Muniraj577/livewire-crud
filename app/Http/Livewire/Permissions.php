<?php

namespace App\Http\Livewire;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Permissions extends Component
{
    public $permissions, $state = [];
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
        $this->dispatchBrowserEvent('initializeDataTable', 'Permission');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->state['name'] = '';
    }



}
