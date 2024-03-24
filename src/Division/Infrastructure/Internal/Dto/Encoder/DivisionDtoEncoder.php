<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal\Dto\Encoder;

use App\Division\Domain\Entity\Division;
use App\Division\Infrastructure\Internal\Dto\DivisionDto;
use App\Division\Infrastructure\Internal\Dto\DivisionGameDto;

class DivisionDtoEncoder
{
    public function encode(Division $division): DivisionDto
    {
        $gameDtoArray = [];

        foreach ($division->getGames() as $game) {
            $gameDtoArray[] = new DivisionGameDto(
                $game->getId(),
                $game->getTeamId(),
                $game->getOpponentId(),
                $game->getResult()->getValue()
            );
        }

        return new DivisionDto(
            $division->getId(),
            $division->getName(),
            $gameDtoArray
        );
    }
}
