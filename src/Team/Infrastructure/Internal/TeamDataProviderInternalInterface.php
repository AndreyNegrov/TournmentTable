<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Internal;

use App\Team\Infrastructure\Internal\Dto\TeamDto;

interface TeamDataProviderInternalInterface
{
    /**
     * @return TeamDto[]
     */
    public function getAllTeamsData(): array;
}
