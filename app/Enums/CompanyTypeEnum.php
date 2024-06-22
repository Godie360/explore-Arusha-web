<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum CompanyTypeEnum: string
{
    use AttributableEnum;

    #[Description('Sole Proprietorship')]
    case SoleProprietorship = 'soleProprietorship';

    #[Description('Partnership')]
    case Partnership = 'partnership';

    #[Description('Corporation')]
    case Corporation = 'corporation';

    #[Description('Limited Liability Company (LLC)')]
    case LLC = 'llc';

    #[Description('Nonprofit Organization')]
    case Nonprofit = 'nonprofit';

    #[Description('Joint Venture')]
    case JointVenture = 'jointVenture';

    #[Description('Government-Owned Corporation')]
    case GovernmentOwned = 'governmentOwned';
}
