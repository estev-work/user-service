<?php

namespace App\ArgumentResolver;

use ReflectionException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

readonly class RequestResolver implements ValueResolverInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator
    ) {
    }

    /**
     * @throws ReflectionException
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        $reflectionClass = new \ReflectionClass($argument->getType());
        return $reflectionClass->implementsInterface(RequestDtoInterface::class);
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $dtoClass = $argument->getType();
        $data = $request->getContent();
        $dto = $this->serializer->deserialize($data, $dtoClass, 'json');

        $violations = $this->validator->validate($dto);
        if (count($violations) > 0) {
            throw new BadRequestHttpException('Validation errors');
        }

        yield $dto;
    }
}