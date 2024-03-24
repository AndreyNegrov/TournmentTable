<?php

declare(strict_types=1);

namespace App\Division\Application\Factory;

use App\Division\Domain\Entity\Division;
use App\Division\Domain\Repository\DivisionRepositoryInterface;

class DivisionFactory
{
    private DivisionRepositoryInterface $divisionRepository;

    public function __construct(DivisionRepositoryInterface $divisionRepository)
    {
        $this->divisionRepository = $divisionRepository;
    }

    public function create($name): Division
    {
        $division = new Division($name);
        $this->divisionRepository->save($division);

        return $division;
    }
}
