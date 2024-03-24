<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Adapter;

use App\Division\Infrastructure\Internal\DivisionGameCreatorInternalInterface;
use App\Team\Application\TeamGameCreatorInterface;

class TeamGameCreatorAdapter implements TeamGameCreatorInterface
{
    private DivisionGameCreatorInternalInterface $divisionGameCreatorInternal;

    public function __construct(DivisionGameCreatorInternalInterface $divisionGameCreatorInternal)
    {
        $this->divisionGameCreatorInternal = $divisionGameCreatorInternal;
    }

    public function create(int $teamId, int $opponentId): int
    {
        $this->divisionGameCreatorInternal->create($teamId, $opponentId);
    }
}
