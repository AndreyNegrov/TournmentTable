<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Provider;

use App\Tournament\Domain\Model\DivisionModel;

interface DivisionDataProviderInterface
{
    /**
     * @return DivisionModel[]
     */
    public function getAllDivisionsData(): array;
}
