<?php

declare(strict_types=1);

namespace App\Team\Application;

use App\Team\Application\Factory\TeamFactory;
use App\Team\Domain\Entity\Team;
use App\Team\Domain\Service\TeamCreatorInterface;

class TeamCreator implements TeamCreatorInterface
{
    private TeamFactory $teamFactory;

    public function __construct(TeamFactory $teamFactory)
    {
        $this->teamFactory = $teamFactory;
    }

    public function create(int $divisionId, string $name): Team
    {
        return $this->teamFactory->create($divisionId, $name);
    }
}
