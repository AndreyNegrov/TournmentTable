<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\ArgumentResolver;

use App\Shared\Infrastructure\ArgumentResolver\Exception\RequestValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestValidationResolver implements ArgumentValueResolverInterface
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function supports(Request $request, ArgumentMetadata $argument)
    {
        $class = $argument->getType();

        if (is_null($class)) {
            return false;
        }

        if (!class_exists($class)) {
            return false;
        }

        $reflection = new \ReflectionClass($class);

        if ($reflection->implementsInterface(RequestObjectInterface::class)) {
            return true;
        }

        return false;
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $class = $argument->getType();
        $dto = new $class($request);

        $errors = $this->validator->validate($dto);

        if (count($errors) >= 1) {
            $errorsArray = [];

            foreach ($errors as $val) {
                $errorsArray[] = [
                    'property' => (string)$val->getPropertyPath(),
                    'message' => (string)$val->getMessage(),
                ];
            }

            throw new RequestValidationException($errorsArray);
        }

        yield $dto;
    }
}
