<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter;

use App\Team\Infrastructure\Internal\Dto\TeamDto;
use App\Team\Infrastructure\Internal\TeamDataProviderInternalInterface;
use App\Tournament\Domain\Model\TeamModel;
use App\Tournament\Domain\Provider\TeamDataProviderInterface;
use App\Tournament\Infrastructure\Adapter\Decoder\TeamDtoDecoder;

class TeamDataProviderAdapter implements TeamDataProviderInterface
{
    private TeamDataProviderInternalInterface $teamDataProviderInternal;
    private TeamDtoDecoder $teamDtoDecoder;

    public function __construct(
        TeamDataProviderInternalInterface $teamDataProviderInternal,
        TeamDtoDecoder $teamDtoDecoder
    ) {
        $this->teamDataProviderInternal = $teamDataProviderInternal;
        $this->teamDtoDecoder = $teamDtoDecoder;
    }

    /**
     * @return TeamModel[]
     */
    public function getAllTeamsData(): array
    {
        $teamDtoArray = $this->teamDataProviderInternal->getAllTeamsData();

        return array_map(fn(TeamDto $teamDto) => $this->teamDtoDecoder->decode($teamDto), $teamDtoArray);
    }
}
