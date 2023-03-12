<?php

namespace App\Http\Livewire;

use App\Models\Mitigasi;
use Livewire\Component;
use Livewire\WithPagination;

class Verif extends Component
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
        $query = Mitigasi::query()->where('is_verif', false);

        if ($this->search != '') {
            $query->where('kegiatan', 'like', '%' . $this->search . '%');
            $search = $this->search;
            $query->orWhereHas('fungsi', function ($q) use ($search) { {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                }
            });
        }

        $mitigasis = $query->paginate(15);

        return view('livewire.verif', [
            'mitigasis' => $mitigasis,
        ]);
    }
}
