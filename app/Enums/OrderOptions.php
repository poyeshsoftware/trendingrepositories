<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class OrderOptions
 * @method static static ASC()
 * @method static static DESC()
 */
final class OrderOptions extends Enum
{
    const ASC = 'asc';
    const DESC = 'desc';
}
