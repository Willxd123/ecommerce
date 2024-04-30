<?php

namespace App\Livewire;

use App\Models\Familia;
use Livewire\Component;

class Navigation extends Component
{
    public $familias;

    public function mount()
    {
        $this->familias = Familia::all();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
