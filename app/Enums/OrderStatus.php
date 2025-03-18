<?php

namespace App\Enums;

enum OrderStatus: string
{
    case NEW = 'новый';
    case COMPLETED = 'выполнен';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
