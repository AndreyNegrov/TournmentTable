<?php

declare(strict_types=1);

namespace App\PlayOff\Application;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Repository\PlayOffGameRepositoryInterface;

class PlayOffGameDataProvider
{
    private PlayOffGameRepositoryInterface $playOffGameRepository;

    public function __construct(PlayOffGameRepositoryInterface $playOffGameRepository)
    {
        $this->playOffGameRepository = $playOffGameRepository;
    }

    /**
     * @return PlayOffGame[]
     */
    public function getAllPlayOffGamesData(): array
    {
        $this->playOffGameRepository->findAll();
    }
}
