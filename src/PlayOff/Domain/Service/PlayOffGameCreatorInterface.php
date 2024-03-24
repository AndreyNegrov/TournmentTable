<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\Service;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Enum\PlayOffStageType;

interface PlayOffGameCreatorInterface
{
    public function create(PlayOffStageType $stage, int $teamId, int $opponentId): PlayOffGame;
}
