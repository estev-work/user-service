<?php

namespace App\Project\Domain\ValueObjects;

use Symfony\Component\Uid\Uuid;

class UserId
{
    public function __construct(private ?string $value = null)
    {
        $this->value = $this->value ?? Uuid::v4();
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}