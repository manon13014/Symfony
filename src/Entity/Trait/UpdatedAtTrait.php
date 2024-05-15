<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait UpdatedAtTrait {

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;



    public function getupdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setupdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[ORM\PreUpdate]
    public function setupdatedAtValue()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}