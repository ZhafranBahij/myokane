<?php

namespace App\Livewire\Admin\Income;

use App\Livewire\Admin\Outcome\OutcomeCreate;
use App\Models\Income;
use App\Models\Outcome;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class IncomeIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;
    public $total_saldo;

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function delete(Income $income){
        $income->delete();

        session()->flash('status', 'Income succesfully deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $incomes = Income::query()
        ->with(['user'])
        ->where('description', 'LIKE', "%".$this->search."%")
        ->paginate(10);

        $total_income = Income::query()
                            ->where('user_id', auth()->user()->id)
                            ->sum('value');

        $total_outcome = Outcome::query()
                        ->where('user_id', auth()->user()->id)
                        ->sum('value');

        $this->total_saldo = "Rp. ".number_format($total_income - $total_outcome, 0, ',', '.');

        return view('livewire.admin.income.income-index', ['incomes' => $incomes]);
    }
}
