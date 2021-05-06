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
}
