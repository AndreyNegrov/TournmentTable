<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Provider;

use App\Tournament\Domain\Model\PlayOffGameModel;

interface PlayOffGameDataProviderInterface
{
    /**
     * @return PlayOffGameModel[]
     */
    public function getAllPlayOffGamesData(): array;
}
