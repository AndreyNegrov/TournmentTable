<?php

declare(strict_types=1);

namespace App\Team\Domain\Repository;

use App\Team\Domain\Entity\Team;

interface TeamRepositoryInterface
{
    /**
     * @return Team[]
     */
    public function findAllInDivision(int $divisionId): array;

    public function findAll(): array;

    public function findById(int $teamId): ?Team;

    public function save(Team $team): void;
}
