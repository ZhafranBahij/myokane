<?php

namespace App\Livewire\Admin\Income;

use App\Models\Income;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class IncomeEdit extends Component
{
    public $id;

    #[Validate]
    public $value, $description, $date;

    public function rules()
    {
        return [
            'value' => 'required|min:1000|max:1000000000|numeric',
            'description' => 'required|min:8|max:100',
        ];
    }


    public function mount(Income $income)
    {
        $this->id = $income->id;
        $this->value = $income->value;
        $this->description = $income->description;
        $this->date = $income->date;
    }

    public function save()
    {
        $this->validate();

        $income = Income::find($this->id)->update([
            'user_id' => auth()->user()->id,
            'value' => $this->value,
            'description' => $this->description,
            'date' => $this->date,
        ]);

        session()->flash('status', 'Income successfully updated.');
        return $this->redirectRoute('incomes.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.income.income-edit');
    }
}
