<?php

namespace App\Livewire\Admin\Outcome;

use App\Models\Outcome;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class OutcomeCreate extends Component
{
    #[Validate]
    public $value, $description;

    public function rules()
    {
        return [
            'value' => 'required|min:1000|max:1000000000|numeric',
            'description' => 'required|min:8|max:100',
        ];
    }

    public function save()
    {
        $this->validate();

        $outcome = Outcome::create([
            'user_id' => auth()->user()->id,
            'value' => $this->value,
            'description' => $this->description,
        ]);

        session()->flash('status', 'Outcome successfully created.');
        return $this->redirectRoute('outcomes.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.outcome.outcome-create');
    }
}
