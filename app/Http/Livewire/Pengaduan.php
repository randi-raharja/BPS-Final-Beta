<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Pengaduan as pengaduans;
use Livewire\Component;
use Livewire\WithPagination;

class Pengaduan extends Component
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
        $query = pengaduans::query();

        if ($this->search != '') {
            $query->where('no_ticket', 'like', '%' . $this->search . '%');
        }

        $pengaduan = $query->paginate(15);

        return view('livewire.pengaduan', [
            'pengaduan' => $pengaduan,
        ]);
    }
}
