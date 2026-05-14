<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case MENTOR = 'mentor';
    case MARKETER = 'marketer';
    case MEMBER = 'member';

    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrator',
            self::MENTOR => 'Mentor',
            self::MARKETER => 'Marketer',
            self::MEMBER => 'Member',
        };
    }
}
