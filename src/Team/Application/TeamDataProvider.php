<?php

declare(strict_types=1);

namespace App\Team\Application;

use App\Team\Domain\Entity\Team;
use App\Team\Domain\Repository\TeamRepositoryInterface;

class TeamDataProvider
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @return Team[]
     */
    public function getAllTeamsData(): array
    {
        return $this->teamRepository->findAll();
    }
}
