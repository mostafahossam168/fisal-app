<?php

namespace App\Enum;

enum UserStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function color(): string
    {
        return match ($this) {
            Self::ACTIVE => 'bg-success',
            Self::INACTIVE => 'bg-danger',
        };
    }
    public function name(): string
    {
        return match ($this) {
            Self::ACTIVE => 'مفعل',
            Self::INACTIVE => 'غير مفعل',
        };
    }
}
