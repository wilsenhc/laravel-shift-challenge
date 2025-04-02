<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Hold = 'hold';
    case Queueing = 'queueing';
    case Running = 'running';
    case Fulfilled = 'fulfilled';
}
