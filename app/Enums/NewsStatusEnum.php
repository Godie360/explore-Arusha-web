<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum NewsStatusEnum: string
{
    use AttributableEnum;

    #[Description('Published')]
    case Published = 'published';

    #[Description('Pending')]
    case Pending  = 'pending';

    #[Description('Draft')]
    case Draft = 'draft';

    public static function exists($value): bool
    {
        foreach (NewsStatusEnum::cases() as $case) {
            if ($case->value == $value) {
                return true;
            }
        }
        return false;
    }
}
