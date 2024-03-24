<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\UseCase;

use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Service\PlayOffGameCreatorInterface;

class CreatePlayOffGame
{
    private PlayOffGameCreatorInterface $playOffGameCreator;

    public function __construct(PlayOffGameCreatorInterface $playOffGameCreator)
    {
        $this->playOffGameCreator = $playOffGameCreator;
    }

    public function create(PlayOffStageType $stage, int $teamId, int $opponentId): int
    {
        return $this
            ->playOffGameCreator
            ->create($stage, $teamId, $opponentId)
            ->getId()
        ;
    }
}
