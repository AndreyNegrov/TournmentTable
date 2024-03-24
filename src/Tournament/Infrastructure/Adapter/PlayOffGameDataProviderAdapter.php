<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter;

use App\PlayOff\Infrastructure\Internal\Dto\PlayOffGameDto;
use App\PlayOff\Infrastructure\Internal\PlayOffGameDataProviderInternalInterface;
use App\Tournament\Domain\Model\PlayOffGameModel;
use App\Tournament\Domain\Provider\PlayOffGameDataProviderInterface;
use App\Tournament\Infrastructure\Adapter\Decoder\PlayOffGameDtoDecoder;

class PlayOffGameDataProviderAdapter implements PlayOffGameDataProviderInterface
{
    private PlayOffGameDataProviderInternalInterface $playOffDataProviderInternal;
    private PlayOffGameDtoDecoder $playOffGameDtoDecoder;

    public function __construct(
        PlayOffGameDataProviderInternalInterface $playOffDataProviderInternal,
        PlayOffGameDtoDecoder $playOffGameDtoDecoder
    ) {
        $this->playOffDataProviderInternal = $playOffDataProviderInternal;
        $this->playOffGameDtoDecoder = $playOffGameDtoDecoder;
    }

    /**
     * @return PlayOffGameModel[]
     */
    public function getAllPlayOffGamesData(): array
    {
        $playOffGameDtoArray = $this->playOffDataProviderInternal->getAllPlayOffGames();

        return array_map(fn(PlayOffGameDto $playOffGameDto) => $this->playOffGameDtoDecoder->decode($playOffGameDto), $playOffGameDtoArray);
    }
}
