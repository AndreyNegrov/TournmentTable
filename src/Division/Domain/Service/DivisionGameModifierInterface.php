<?php

declare(strict_types=1);

namespace App\Division\Domain\Service;

use App\Division\Domain\Enum\GameResultType;

interface DivisionGameModifierInterface
{
    public function changeResult(int $teamId, int $opponentId, DivisionGameResultType $result): void;
}
