<?php

namespace App\Http\Livewire;

use App\Models\Mitigasi as ModelsMitigasi;
use Livewire\Component;
use Livewire\WithPagination;

class Mitigasi extends Component
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
        $query = ModelsMitigasi::query();

        if ($this->search != '') {
            $query->where('kegiatan', 'like', '%' . $this->search . '%');
            $search = $this->search;
            $query->orWhereHas('fungsi', function ($q) use ($search) { {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                }
            });
        }

        $mitigasis = $query->paginate(15);

        return view('livewire.mitigasi', [
            'mitigasis' => $mitigasis,
        ]);
    }
}
