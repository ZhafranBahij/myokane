<?php

namespace App\Livewire\Admin\Outcome;

use App\Models\Outcome;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class OutcomeIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function delete(Outcome $outcome){
        $outcome->delete();

        session()->flash('status', 'Outcome succesfully deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $outcomes = Outcome::query()
        ->with(['User'])
        ->where('description', 'LIKE', "%".$this->search."%")
        ->paginate(10);

        return view('livewire.admin.outcome.outcome-index', ['outcomes' => $outcomes]);
    }
}
