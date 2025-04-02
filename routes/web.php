<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order/{next}', function ($next) {
    return redirect()->to('/?next=' . $next);
})->name('order.next');
