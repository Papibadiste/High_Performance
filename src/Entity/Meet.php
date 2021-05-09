<?php

namespace App\Entity;

use App\Repository\MeetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass=MeetRepository::class)
 */
class Meet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Beet::class, mappedBy="meet")
     */
    private $beets;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, inversedBy="meets")
     */
    private $teams;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class, inversedBy="meets")
     */
    private $sport;

    public function __construct()
    {
        $this->beets = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Beet[]
     */
    public function getBeets(): Collection
    {
        return $this->beets;
    }

    public function addBeet(Beet $beet): self
    {
        if (!$this->beets->contains($beet)) {
            $this->beets[] = $beet;
            $beet->setMeet($this);
        }

        return $this;
    }

    public function removeBeet(Beet $beet): self
    {
        if ($this->beets->removeElement($beet)) {
            // set the owning side to null (unless already changed)
            if ($beet->getMeet() === $this) {
                $beet->setMeet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        $this->teams->removeElement($team);

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
    }
}
