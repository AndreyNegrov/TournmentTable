<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter\Decoder;

use App\PlayOff\Infrastructure\Internal\Dto\PlayOffGameDto;
use App\Tournament\Domain\Model\PlayOffGameModel;

class PlayOffGameDtoDecoder
{
    public function decode(PlayOffGameDto $gameDto): PlayOffGameModel
    {
        return new PlayOffGameModel(
            $gameDto->getId(),
            $gameDto->getTeamId(),
            $gameDto->getOpponentId(),
            $gameDto->getResult(),
            $gameDto->getStage()
        );
    }
}
