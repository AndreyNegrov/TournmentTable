<?php

declare(strict_types=1);

namespace App\PlayOff\Application\Factory;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Repository\PlayOffGameRepositoryInterface;

class PlayOffGameFactory
{
    private PlayOffGameRepositoryInterface $playOffGameRepository;

    public function __construct(PlayOffGameRepositoryInterface $playOffGameRepository)
    {
        $this->playOffGameRepository = $playOffGameRepository;
    }

    public function create(PlayOffStageType $stage, int $teamId, int $opponentId): PlayOffGame
    {
        $playOff = new PlayOffGame($stage, $teamId, $opponentId);
        $this->playOffGameRepository->save($playOff);

        return $playOff;
    }
}
