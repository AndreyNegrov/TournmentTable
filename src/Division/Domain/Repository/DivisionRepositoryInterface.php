<?php

declare(strict_types=1);

namespace App\Division\Domain\Repository;

use App\Division\Domain\Entity\Division;

interface DivisionRepositoryInterface
{
    public function save(Division $division): void;

    public function find(int $id): ?Division;

    /**
     * @return Division[]
     */
    public function findAll(): array;
}
