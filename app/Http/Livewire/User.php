<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch($search)
    {
        $this->search = $search;
    }
    public function render()
    {
        $query = ModelsUser::query();

        if ($this->search != '') {
            $query->where('name', 'like', '%' . $this->search . '%');
            $query->orWhere('email', 'like', '%' . $this->search . '%');
            $search = $this->search;
            $query->orWhereHas('role', function ($q) use ($search) { {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                }
            });
        }

        $users = $query->paginate(15);
        return view('livewire.user', [
            'users' => $users
        ]);
    }
}
