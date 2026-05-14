<?php

namespace App\Enums;

enum LeadStatus: string
{
    case NEW = 'new';
    case CONTACTED = 'contacted';
    case INTERESTED = 'interested';
    case CONVERTED = 'converted';
    case LOST = 'lost';

    public function label(): string
    {
        return match($this) {
            self::NEW => 'New',
            self::CONTACTED => 'Contacted',
            self::INTERESTED => 'Interested',
            self::CONVERTED => 'Converted',
            self::LOST => 'Lost',
        };
    }
}
