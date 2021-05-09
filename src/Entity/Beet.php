<?php

namespace App\Entity;

use App\Repository\BeetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BeetRepository::class)
 */
class Beet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $gold_play;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="beets")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Meet::class, inversedBy="beets")
     */
    private $meet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoldPlay(): ?float
    {
        return $this->gold_play;
    }

    public function setGoldPlay(float $gold_play): self
    {
        $this->gold_play = $gold_play;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMeet(): ?Meet
    {
        return $this->meet;
    }

    public function setMeet(?Meet $meet): self
    {
        $this->meet = $meet;

        return $this;
    }
}
