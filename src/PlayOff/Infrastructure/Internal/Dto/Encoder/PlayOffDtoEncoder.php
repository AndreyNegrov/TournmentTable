<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Internal\Dto\Encoder;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Infrastructure\Internal\Dto\PlayOffGameDto;

class PlayOffDtoEncoder
{
    public function encode(PlayOffGame $playOffGame): PlayOffGameDto
    {
        return new PlayOffGameDto(
            $playOffGame->getId(),
            $playOffGame->getTeamId(),
            $playOffGame->getOpponentId(),
            $playOffGame->getStage()->getValue(),
            $playOffGame->getResult()->getValue()
        );
    }
}
