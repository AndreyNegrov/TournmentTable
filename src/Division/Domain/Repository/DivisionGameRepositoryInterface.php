<?php

declare(strict_types=1);

namespace App\Division\Domain\Repository;

use App\Division\Domain\Entity\DivisionGame;

interface DivisionGameRepositoryInterface
{
    public function save(DivisionGame $game): void;

    public function findByParticipants(int $teamId, int $opponentId): ?DivisionGame;
}
