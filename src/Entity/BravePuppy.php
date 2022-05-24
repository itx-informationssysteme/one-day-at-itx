<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BravePuppyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BravePuppyRepository::class)
 */
#[ApiResource]
class BravePuppy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dueTo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDueTo(): ?\DateTimeInterface
    {
        return $this->dueTo;
    }

    public function setDueTo(?\DateTimeInterface $dueTo): self
    {
        $this->dueTo = $dueTo;

        return $this;
    }
}
