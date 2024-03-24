<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\Repository;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Enum\PlayOffStageType;

interface PlayOffGameRepositoryInterface
{
    public function save(PlayOffGame $game): void;

    public function findByStageAndTeam(PlayOffStageType $stage, int $teamId): ?PlayOffGame;

    /**
     * @return PlayOffGame[]
     */
    public function findAll(): array;
}
