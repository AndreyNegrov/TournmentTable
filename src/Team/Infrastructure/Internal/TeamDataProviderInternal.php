<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Internal;

use App\Team\Application\TeamDataProvider;
use App\Team\Domain\Entity\Team;
use App\Team\Infrastructure\Internal\Dto\Encoder\TeamDtoEncoder;
use App\Team\Infrastructure\Internal\Dto\TeamDto;

class TeamDataProviderInternal implements TeamDataProviderInternalInterface
{
    private TeamDataProvider $teamDataProvider;
    private TeamDtoEncoder $teamDtoEncoder;

    public function __construct(
        TeamDataProvider $teamDataProvider,
        TeamDtoEncoder $teamDtoEncoder
    ) {
        $this->teamDataProvider = $teamDataProvider;
        $this->teamDtoEncoder = $teamDtoEncoder;
    }

    /**
     * @return TeamDto[]
     */
    public function getAllTeamsData(): array
    {
        $teams = $this->teamDataProvider->getAllTeamsData();

        return array_map(fn(Team $team) => $this->teamDtoEncoder->encode($team), $teams);
    }
}
