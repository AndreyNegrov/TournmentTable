<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal;

use App\Division\Application\DivisionGameCreator;

class DivisionGameCreatorInternal implements DivisionGameCreatorInternalInterface
{
    private DivisionGameCreator $divisionGameCreator;

    public function __construct(DivisionGameCreator $divisionGameCreator)
    {
        $this->divisionGameCreator = $divisionGameCreator;
    }

    public function create(int $teamId, int $opponentId): int
    {
        return $this
            ->divisionGameCreator
            ->create($teamId, $opponentId)
            ->getId()
        ;
    }
}
