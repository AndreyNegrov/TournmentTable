<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\ArgumentResolver\Exception;

use Symfony\Component\HttpFoundation\Response;
use RuntimeException;

class RequestValidationException extends RuntimeException
{
    private int $httpCode = Response::HTTP_UNPROCESSABLE_ENTITY;

    private string $label = 'Request validation error';

    private array $errors = [];

    public function __construct(?array $errors = null, ?int $httpCode = null, ?string $label = null)
    {
        if (!is_null($httpCode)) {
            $this->httpCode = $httpCode;
        }

        if (!is_null($label)) {
            $this->label = $label;
        }

        if (!is_null($errors)) {
            $this->errors = $errors;
        }
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
