<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal;

use App\Division\Application\DivisionDataProvider;
use App\Division\Domain\Entity\Division;
use App\Division\Infrastructure\Internal\Dto\Encoder\DivisionDtoEncoder;

class DivisionDataProviderInternal implements DivisionDataProviderInternalInterface
{
    private DivisionDataProvider $divisionDataProvider;
    private DivisionDtoEncoder $divisionDtoEncoder;

    public function __construct(
        DivisionDataProvider $divisionDataProvider,
        DivisionDtoEncoder $divisionDtoEncoder
    ) {
        $this->divisionDataProvider = $divisionDataProvider;
        $this->divisionDtoEncoder = $divisionDtoEncoder;
    }

    public function getAllDivisionsData(): array
    {
        $divisions = $this->divisionDataProvider->getAllDivisionsData();

        return array_map(fn(Division $division) => $this->divisionDtoEncoder->encode($division), $divisions);
    }
}
