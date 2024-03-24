<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Repository;

use App\Division\Domain\Entity\DivisionGame;
use App\Division\Domain\Repository\DivisionGameRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DivisionGameRepository implements DivisionGameRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(DivisionGame::class);
    }

    public function save(DivisionGame $game): void
    {
        $this->entityManager->persist($game);
        $this->entityManager->flush();
    }

    public function findByParticipants(int $teamId, int $opponentId): ?DivisionGame
    {
        $this->repository->findOneBy([
            'teamId' => $teamId,
            'opponentId' => $opponentId
        ]);
    }
}
