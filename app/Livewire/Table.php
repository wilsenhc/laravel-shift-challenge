<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $orders = Order::query()
            ->with([
                'product.nextShift',
            ])
            ->get();

        return view('livewire.table', [
            'orders' => $orders,
        ]);
    }
}
