<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Controller\Request;

use App\Division\Domain\Enum\DivisionGameResultType;
use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ChangeDivisionGameResultRequest implements RequestObjectInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *    type="integer",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Range(min="1")
     */
    private int $teamId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *    type="integer",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Range(min="1")
     */
    private int $opponentId;

    /**
     * @Assert\NotBlank(),
     * @Assert\Type(
     *    type="string",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Length(
     *     min=1,
     *     max=20,
     *     exactMessage="Property should have exactly {{ limit }} characters.",
     *     allowEmptyString=false
     *  )
     */
    private string $result;

    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->teamId = $json['team_id'] ?? null;
        $this->opponentId = $json['opponent_id'] ?? null;
        $this->result = $json['result'] ?? null;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getOpponentId(): int
    {
        return $this->opponentId;
    }

    public function getResult(): DivisionGameResultType
    {
        return DivisionGameResultType::from($this->result);
    }
}
