<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self ONE_EIGHT()
 * @method static self QUARTER()
 * @method static self SEMI()
 * @method static self FINAL()
 */
class PlayOffStageType extends Enum
{
    private const ONE_EIGHT = 'one_eight';
    private const QUARTER = 'quarter';
    private const SEMI = 'semi';
    private const FINAL = 'final';
}
