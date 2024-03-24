<?php

declare(strict_types=1);

namespace App\Division\Domain\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self FIRST_TEAM_WIN()
 * @method static self SECOND_TEAM_WIN()
 * @method static self DRAW()
 * @method static self UNPLAYED()
 */
class DivisionGameResultType extends Enum
{
    private const FIRST_TEAM_WIN = 'first_team_win';
    private const SECOND_TEAM_WIN = 'second_team_win';
    private const DRAW = 'draw';
    private const UNPLAYED = 'unplayed';
}
