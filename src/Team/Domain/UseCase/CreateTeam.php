<?php

declare(strict_types=1);

namespace App\Team\Domain\UseCase;

use App\Team\Domain\Service\TeamCreatorInterface;
use App\Team\Domain\Service\TeamGamesCreatorInterface;

class CreateTeam
{
    private TeamCreatorInterface $teamCreator;
    private TeamGamesCreatorInterface $teamGamesCreator;

    public function __construct(
        TeamCreatorInterface $teamCreator,
        TeamGamesCreatorInterface $teamGamesCreator
    ) {
        $this->teamCreator = $teamCreator;
        $this->teamGamesCreator = $teamGamesCreator;
    }

    public function create(int $divisionId, string $name): int
    {
        $team = $this
            ->teamCreator
            ->create($divisionId, $name)
        ;

        $this->teamGamesCreator->createGames($team);

        return $team->getId();
    }
}
