<?php

declare(strict_types=1);

namespace App\Team\Domain\UseCase;

use App\Team\Domain\Service\TeamModifierInterface;

class ChangeTeamScore
{
    private TeamModifierInterface $teamModifier;

    public function __construct(TeamModifierInterface $teamModifier)
    {
        $this->teamModifier = $teamModifier;
    }

    public function change(int $teamId, int $score): void
    {
        $this->teamModifier->changeScore($teamId, $score);
    }
}
