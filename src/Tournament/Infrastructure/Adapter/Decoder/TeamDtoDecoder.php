<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter\Decoder;

use App\Team\Infrastructure\Internal\Dto\TeamDto;
use App\Tournament\Domain\Model\TeamModel;

class TeamDtoDecoder
{
    public function decode(TeamDto $teamDto): TeamModel
    {
        return new TeamModel(
            $teamDto->getId(),
            $teamDto->getName(),
            $teamDto->getDivisionId(),
            $teamDto->getScore(),
            $teamDto->getRating()
        );
    }
}
