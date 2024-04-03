<?php

namespace App\Livewire\Admin\Outcome;

use App\Models\Income;
use App\Models\Outcome;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class OutcomeIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search, $total_saldo;

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

        if (! auth()->user()->hasRole(['admin', 'true admin'])) {
            $outcomes = Outcome::query()
            ->with(['User'])
            ->where('user_id', auth()->user()->id)
            ->where('description', 'LIKE', "%".$this->search."%")
            ->paginate(10);
        }

        $total_income = Income::query()
        ->where('user_id', auth()->user()->id)
        ->sum('value');

        $total_outcome = Outcome::query()
            ->where('user_id', auth()->user()->id)
            ->sum('value');

        // dd($total_income);

        $this->total_saldo = "Rp. ".number_format($total_income - $total_outcome, 0, ',', '.');

        return view('livewire.admin.outcome.outcome-index', ['outcomes' => $outcomes]);
    }
}
