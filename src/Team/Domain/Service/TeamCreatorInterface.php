<?php

declare(strict_types=1);

namespace App\Team\Domain\Service;

use App\Team\Domain\Entity\Team;

interface TeamCreatorInterface
{
    public function create(int $divisionId, string $name): Team;
}
