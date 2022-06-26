<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateExamForm extends Component
{

    public $questionNumber = 2;
    public function render()
    {
        return view('livewire.create-exam-form');
    }
}
