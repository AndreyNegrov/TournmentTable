<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Repository;

use App\PlayOff\Domain\Entity\PlayOffGame;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Repository\PlayOffGameRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class PlayOffGameRepository implements PlayOffGameRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(PlayOffGame::class);
    }

    public function save(PlayOffGame $game): void
    {
        $this->entityManager->persist($game);
        $this->entityManager->flush();
    }

    public function findByStageAndTeam(PlayOffStageType $stage, int $teamId): ?PlayOffGame
    {
        return $this->repository->findOneBy([
            'stage' => $stage,
            'teamId' => $teamId
        ]);
    }

    /**
     * @return PlayOffGame[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
