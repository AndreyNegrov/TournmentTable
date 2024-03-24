<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\Entity;

use App\PlayOff\Domain\Enum\PlayOffResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="play_off")
 * @ORM\Entity()
 */
class PlayOffGame
{
    use TimestampableEntity;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(name="team_id", type="integer", nullable=true)
     */
    private int $teamId;

    /**
     * @ORM\Column(name="division_id", type="integer", nullable=true)
     */
    private int $opponentId;

    /**
     * @ORM\Column(name="result", type=PlayOffResultType::class)
     */
    private PlayOffResultType $result;

    /**
     * @ORM\Column(name="stage", type=PlayOffStageType::class)
     */
    private PlayOffStageType $stage;

    public function __construct(
        PlayOffStageType $offStageType,
        int $teamId,
        int $opponentId,
        ?PlayOffResultType $result = null
    ) {
        $this->stage = $offStageType;
        $this->teamId = $teamId;
        $this->opponentId = $opponentId;
        $this->result = $result ?? PlayOffResultType::UNPLAYED();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getOpponentId(): int
    {
        return $this->opponentId;
    }

    public function getResult(): PlayOffResultType
    {
        return $this->result;
    }

    public function getStage(): PlayOffStageType
    {
        return $this->stage;
    }

    public function changeResult(PlayOffResultType $result): void
    {
        $this->result = $result;
    }
}
