<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Internal\Dto\Encoder;

use App\Team\Domain\Entity\Team;
use App\Team\Infrastructure\Internal\Dto\TeamDto;

class TeamDtoEncoder
{
    public function encode(Team $team): TeamDto
    {
        return new TeamDto(
            $team->getId(),
            $team->getName(),
            $team->getDivision(),
            $team->getScore(),
            $team->getRating()
        );
    }
}
