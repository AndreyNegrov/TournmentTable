<?php

declare(strict_types=1);

namespace App\Team\Domain\Service;

use App\Team\Domain\Entity\Team;

interface TeamGamesCreatorInterface
{
    public function createGames(Team $team): void;
}
