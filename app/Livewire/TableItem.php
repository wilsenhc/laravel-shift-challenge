<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TableItem extends Component
{
    public Order $order;

    public string $status;

    public function mount(Order $order)
    {
        $this->order = $order;

        $this->status = $order->status->value;
    }

    public function render()
    {
        return view('livewire.table-item', [
            'order' => $this->order,
        ]);
    }
}
