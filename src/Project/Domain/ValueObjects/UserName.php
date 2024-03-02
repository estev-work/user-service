<?php

namespace App\Project\Domain\ValueObjects;

use App\Project\Domain\Exceptions\DomainNameValidationException;

class UserName
{
    private const int MIN_LEN = 5;

    public function __construct(private string $value)
    {
        if ($this->value === '') {
            $this->value = 'User-' . hash('md5', random_bytes(10));
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @throws DomainNameValidationException
     */
    public function changeName(string $newName): void
    {
        if (strlen($newName) < self::MIN_LEN) {
            throw new DomainNameValidationException();
        }
        if ($newName !== '') {
            $this->value = $newName;
        }
    }
}