<?php

declare(strict_types=1);

namespace App\PlayOff\Application;

use App\PlayOff\Application\Factory\PlayOffGameFactory;
use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Service\PlayOffGameCreatorInterface;

class PlayOffGameCreator implements PlayOffGameCreatorInterface
{
    private PlayOffGameFactory $playOffGameFactory;

    public function __construct(PlayOffGameFactory $playOffGameFactory)
    {
        $this->playOffGameFactory = $playOffGameFactory;
    }

    public function create(PlayOffStageType $stage, int $teamId, int $opponentId): PlayOffGame
    {
        return $this->playOffGameFactory->create($stage, $teamId, $opponentId);
    }
}
