<?php

declare(strict_types=1);

namespace App\Division\Application;

use App\Division\Domain\Entity\Division;
use App\Division\Domain\Repository\DivisionRepositoryInterface;

class DivisionDataProvider
{
    private DivisionRepositoryInterface $divisionRepository;

    public function __construct(DivisionRepositoryInterface $divisionRepository)
    {
        $this->divisionRepository = $divisionRepository;
    }

    /**
     * @return Division[]
     */
    public function getAllDivisionsData(): array
    {
        return $this->divisionRepository->findAll();
    }
}
