<?php

declare(strict_types=1);

namespace App\Team\Application;

use App\Team\Domain\Entity\Team;
use App\Team\Domain\Repository\TeamRepositoryInterface;
use App\Team\Domain\Service\TeamGamesCreatorInterface;

class TeamGamesCreator implements TeamGamesCreatorInterface
{
    private TeamRepositoryInterface $teamRepository;
    private TeamGameCreatorInterface $gameCreator;

    public function __construct(
        TeamRepositoryInterface $teamRepository,
        TeamGameCreatorInterface $gameCreator
    ) {
        $this->teamRepository = $teamRepository;
        $this->gameCreator = $gameCreator;
    }

    public function createGames(Team $team): void
    {
        $allDivisionTeams = $this->teamRepository->findAllInDivision($team->getDivision());
        $teamId = $team->getId();

        foreach ($allDivisionTeams as $divisionTeam) {
            if ($divisionTeam->getId() !== $teamId) {
                $oppositeTeamId = $divisionTeam->getId();
                $this->gameCreator->create($teamId, $oppositeTeamId);
            }
        }
    }
}
