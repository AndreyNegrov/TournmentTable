<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Controller\Request;

use App\PlayOff\Domain\Enum\PlayOffResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePlayOffGameResultRequest implements RequestObjectInterface
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
    private string $stage;

    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->teamId = $json['team_id'] ?? null;
        $this->result = $json['result'] ?? null;
        $this->stage = $json['stage'] ?? null;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getResult(): PlayOffResultType
    {
        return PlayOffResultType::from($this->result);
    }

    public function getStage(): PlayOffStageType
    {
        return PlayOffStageType::from($this->stage);
    }
}
