<?php

namespace App\Http\Livewire;

use Livewire\Component;
use APP\Models\User;
use APP\Models\Matricula;
use Livewire\WithPagination;

class ShowEstudiantes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $sort = "id";
    public $direction = "asc";

    public function render()
    {
        $estudiantes = User::where('name','like','%' . $this->search.'%')
        ->orwhere('ap_paterno','like','%' . $this->search.'%')
        ->orwhere('ap_materno','like','%' . $this->search.'%')
        ->orwhere('dni','like','%' . $this->search.'%')
        ->orwhere('codigo','like','%' . $this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(6);
        return view('livewire.show-estudiantes',compact('estudiantes'));
    }

    public function order($sort){
        if ($this->sort == $sort)
        {
            if($this->direction == 'asc'){
                $this->direction ='desc';
            }

            else {
                $this->direction = 'asc';
            }
        }
        else{
            $this->sort = $sort;
            $this->direction ='desc';
        }
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}