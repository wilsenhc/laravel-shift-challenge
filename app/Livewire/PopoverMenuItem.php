<?php

namespace App\Livewire;

use Livewire\Component;

class PopoverMenuItem extends Component
{
    public $href;

    public $label;

    public function mount($href = null, $label = null)
    {
        $this->href = $href;
        $this->label = $label;
    }

    public function render()
    {
        return view('livewire.popover-menu-item');
    }
}
