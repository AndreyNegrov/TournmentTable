<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Internal;

use App\PlayOff\Infrastructure\Internal\Dto\PlayOffGameDto;

interface PlayOffGameDataProviderInternalInterface
{
    /**
     * @return PlayOffGameDto[]
     */
    public function getAllPlayOffGames(): array;
}
