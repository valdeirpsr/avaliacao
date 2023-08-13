<?php

namespace App\Enums;

enum Manufacturer: string {
    case Electrolux = 'Electrolux';
    case Brastemp = 'Brastemp';
    case Fischer = 'Fischer';
    case Samsung = 'Samsung';
    case LG = 'LG';

    public static function values(): array
    {
        return collect(Manufacturer::cases())
            ->map(fn($m) => $m->value)
            ->toArray();
    }
}
