<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventListener;

use App\Shared\Infrastructure\ArgumentResolver\Exception\RequestValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof RequestValidationException) {
            throw $exception;
        } else {
            $event->setResponse(
                new Response('Something went wrong, contact your administrator', Response::HTTP_INTERNAL_SERVER_ERROR)
            );
        }
    }
}
