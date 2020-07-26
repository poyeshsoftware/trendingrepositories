<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static STARS()
 */
final class SortOptions extends Enum
{
    const STARS = 'stars';
    const FORKS = 'forks';
    const UPDATED = 'updated';
    const HELP_WANTED_ISSUES = 'help-wanted-issues';
}
