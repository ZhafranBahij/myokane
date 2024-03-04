<?php

namespace App\Livewire\Admin\Income;

use App\Models\Income;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class IncomeIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

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
        ->with(['User'])
        ->where('description', 'LIKE', "%".$this->search."%")
        ->paginate(10);

        return view('livewire.admin.income.income-index', ['incomes' => $incomes]);
    }
}
