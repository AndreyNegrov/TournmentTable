<?php

declare(strict_types=1);

namespace App\Division\Domain\Service;

use App\Division\Domain\Entity\Division;

interface DivisionCreatorInterface
{
    public function create(string $name): Division;
}
