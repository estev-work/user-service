<?php

namespace App\Project\Infrastructure\Entity;

use App\Project\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepositoryInterface::class)]
#[ORM\Table(name: "posts")]
readonly class UserEntity
{
    #[ORM\Id()]
    #[ORM\Column(type: "uuid", nullable: false)]
    protected string $id;

    #[ORM\Column(name: 'name', type: "string", length: 50, nullable: false)]
    protected string $name;

    #[ORM\Column(name: "created_at", type: "string", nullable: false)]
    protected string $createdAt;
    #[ORM\Column(name: "updated_at", type: "string", nullable: false)]
    protected string $updatedAt;

    /**
     * @param string|null $id
     * @param string|null $name
     * @param string|null $createdAt
     * @param string $updatedAt
     */
    public function __construct(
        ?string $id,
        ?string $name,
        ?string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
}