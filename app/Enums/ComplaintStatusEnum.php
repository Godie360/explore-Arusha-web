<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum ComplaintStatusEnum: string
{
    use AttributableEnum;

    #[Description('Completed')]
    case Completed = 'completed';

    #[Description('Pending')]
    case Pending  = 'pending';

    #[Description('Active')]
    case Active = 'active';
}
