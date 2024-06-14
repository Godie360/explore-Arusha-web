<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum CompanyStatusEnum: int
{
    use AttributableEnum;

    case Active = 1;
    case Inactive = 0;
    case Locked = 2;
    case Suspended = 3;
    case Terminated = 4;
    case Deactivated = 5;
}
