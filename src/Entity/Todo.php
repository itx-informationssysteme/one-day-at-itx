<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TodoRepository::class)
 */
#[ApiResource]
class Todo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40, nullable=false, options={"default" : "other"})
     * @Assert\NotBlank()
     */
    private $topicname;

    /**
     * @ORM\Column(type="string", length=70, nullable=true,options={"default" : "Later selected"})
     */
    private $topicdes;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"read"})
     */
    private $finishdate;

    /**
     * @ORM\Column(type="boolean",options={"default" : false})
     */
    private $completed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopicname(): ?string
    {
        return $this->topicname;
    }

    public function setTopicname(?string $topicname): self
    {
        $this->topicname = $topicname;

        return $this;
    }

    public function getTopicdes(): ?string
    {
        return $this->topicdes;
    }

    public function setTopicdes(?string $topicdes): self
    {
        $this->topicdes = $topicdes;

        return $this;
    }

    public function getFinishdate(): ?\DateTimeInterface
    {
        return $this->finishdate;
    }

    public function setFinishdate(?\DateTimeInterface $finishdate): self
    {
        $this->finishdate = $finishdate;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(?bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }
}
