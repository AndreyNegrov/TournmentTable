<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Provider;

use App\Tournament\Domain\Model\TeamModel;

interface TeamDataProviderInterface
{
    /**
     * @return TeamModel[]
     */
    public function getAllTeamsData(): array;
}
