<?php

namespace App\Livewire;

use Livewire\Component;

class PopoverMenu extends Component
{
    public bool $isOpen = false;

    public $items;

    public $order;

    public function mount($items, $order)
    {
        $this->isOpen = false;

        $this->items = $items;
        $this->order = $order;
    }

    public function toggleMenu()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeMenu()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.popover-menu');
    }
}
