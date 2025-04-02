<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TableItem extends Component
{
    public $order;

    public function mount($order = null)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.table-item');
    }
}
