<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Internal;

use App\PlayOff\Application\PlayOffGameDataProvider;
use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Infrastructure\Internal\Dto\Encoder\PlayOffDtoEncoder;
use App\PlayOff\Infrastructure\Internal\Dto\PlayOffGameDto;

class PlayOffGameDataProviderInternal implements PlayOffGameDataProviderInternalInterface
{
    private PlayOffGameDataProvider $playOffGameDataProvider;
    private PlayOffDtoEncoder $playOffDtoEncoder;

    public function __construct(
        PlayOffGameDataProvider $playOffGameDataProvider,
        PlayOffDtoEncoder $playOffDtoEncoder
    ) {
        $this->playOffGameDataProvider = $playOffGameDataProvider;
        $this->playOffDtoEncoder = $playOffDtoEncoder;
    }

    /**
     * @return PlayOffGameDto[]
     */
    public function getAllPlayOffGames(): array
    {
        $playOffGames = $this->playOffGameDataProvider->getAllPlayOffGamesData();

        return array_map(fn(PlayOffGame $game) => $this->playOffDtoEncoder->encode($game), $playOffGames);
    }
}
