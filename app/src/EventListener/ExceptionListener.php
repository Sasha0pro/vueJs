<?php

namespace App\EventListener;

use Doctrine\ORM\Exception\EntityIdentityCollisionException;
use InvalidArgumentException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Serializer\SerializerInterface;


#[AsEventListener(event: ExceptionEvent::class, method: 'onKernelException' )]

class ExceptionListener
{
    public  function __construct
    (
        private readonly SerializerInterface $serializer
    ){}
    #[AsEventListener(event: ExceptionEvent::class)]
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $response = new JsonResponse();

//        if ($exception instanceof EntityIdentityCollisionException) {
//            if ($exception->getCode() === 404) {
//                $response->setContent("Не найдено сущности по указанному идентификатору");
//            }
//        }
//
//      else if ($exception instanceof InvalidArgumentException) {
//            dd($exception);
//        }
        if ($exception instanceof ValidationFailedException) {
            $this->serializer->serialize($exception->getViolations(),'json');
        }

        $response->setContent($this->exceptionToJson($exception));

        $event->setResponse($response);
    }

    public function exceptionToJson(\Throwable $exception): string
    {
        return json_encode(
            [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString(),
            ]
        );
    }
}
