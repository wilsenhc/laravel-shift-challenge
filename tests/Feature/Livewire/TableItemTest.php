<?php

use App\Livewire\TableItem;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(TableItem::class)
        ->assertStatus(200);
});
