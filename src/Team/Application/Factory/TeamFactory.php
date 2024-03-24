<?php

declare(strict_types=1);

namespace App\Team\Application\Factory;

use App\Team\Domain\Entity\Team;
use App\Team\Domain\Repository\TeamRepositoryInterface;

class TeamFactory
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function create(int $divisionId, string $name): Team
    {
        $team = new Team($divisionId, $name);
        $this->teamRepository->save($team);

        return $team;
    }
}
