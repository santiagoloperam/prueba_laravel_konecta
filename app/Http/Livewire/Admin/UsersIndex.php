<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
	use WithPagination;

    public $search;
    public $name;
    public $sortColumn = "id";
    public $sortDirection = "asc";
	public $columns = [
        ['name' => 'id', 'description' => 'ID'],
        ['name' => 'name', 'description' => 'NOMBRE'],
        ['name' => 'email', 'description' => 'CORREO']
    ];
    public $perpage = 10;

	protected $paginationTheme = "bootstrap";

	public function updatingSearch(){
    	$this->resetPage();
    }

    public function render()
    {
    	$users = User::select('users.*')
                ->orderBy($this->sortColumn,$this->sortDirection);

        if ($this->search){
            $users->where('users.name','LIKE','%'.$this->search.'%')
                ->orWhere('users.email','LIKE','%'.$this->search.'%');
         }   
    			
			$users = $users->paginate($this->perpage);

        //dd($users); 

        return view('livewire.admin.users-index',compact('users'));
    }

    public function sort($column){
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}
