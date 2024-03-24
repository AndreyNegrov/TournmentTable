<?php

declare(strict_types=1);

namespace App\Division\Domain\Entity;

use App\Division\Domain\Enum\DivisionGameResultType;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="game")
 * @ORM\Entity()
 */
class DivisionGame
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
     * @ORM\Column(name="result", type=DivisionGameResultType::class)
     */
    private DivisionGameResultType $result;

    /**
     * @ORM\ManyToOne(targetEntity="Division", inversedBy="games")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private Division $division;

    public function __construct(
        Division $division,
        int $teamId,
        int $opponentId,
        ?DivisionGameResultType $result = null
    ) {
        $this->division = $division;
        $this->teamId = $teamId;
        $this->opponentId = $opponentId;
        $this->result = $result ?? DivisionGameResultType::UNPLAYED();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResult(): DivisionGameResultType
    {
        return $this->result;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getOpponentId(): int
    {
        return $this->opponentId;
    }

    public function changeResult(DivisionGameResultType $result): void
    {
        $this->result = $result;
    }

    public function getDivision(): Division
    {
        return $this->division;
    }
}
