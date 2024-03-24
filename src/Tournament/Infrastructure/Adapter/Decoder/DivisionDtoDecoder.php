<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter\Decoder;

use App\Division\Infrastructure\Internal\Dto\DivisionDto;
use App\Tournament\Domain\Model\DivisionGameModel;
use App\Tournament\Domain\Model\DivisionModel;

class DivisionDtoDecoder
{
    public function decode(DivisionDto $divisionDto): DivisionModel
    {
        $divisionGameDtoArray = $divisionDto->getDivisionGames();

        $divisionGames = [];

        foreach ($divisionGameDtoArray as $divisionGameDto) {
            $divisionGames[] = new DivisionGameModel(
                $divisionGameDto->getId(),
                $divisionGameDto->getTeamId(),
                $divisionGameDto->getOpponentId(),
                $divisionGameDto->getResult()
            );
        }

        return new DivisionModel(
            $divisionDto->getId(),
            $divisionDto->getName(),
            $divisionGames
        );
    }
}
