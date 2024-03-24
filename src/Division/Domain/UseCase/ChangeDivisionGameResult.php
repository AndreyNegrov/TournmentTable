<?php

declare(strict_types=1);

namespace App\Division\Domain\UseCase;

use App\Division\Domain\Enum\DivisionGameResultType;
use App\Division\Domain\Service\DivisionGameModifierInterface;

class ChangeDivisionGameResult
{
    private DivisionGameModifierInterface $divisionGameModifier;

    public function __construct(DivisionGameModifierInterface $divisionGameModifier)
    {
        $this->divisionGameModifier = $divisionGameModifier;
    }

    public function change(int $teamId, int $opponentId, DivisionGameResultType $result): void
    {
        $this->divisionGameModifier->changeResult($teamId, $opponentId, $result);
    }
}
