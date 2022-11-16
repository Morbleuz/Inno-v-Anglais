<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: ListeRepository::class)]
#[ApiResource(
    itemOperations: ["get"=>["security"=>"is_granted('ROLE_USER')"],
        "patch"=>["security"=>"is_granted('ROLE_ADMIN')"]],
    collectionOperations: ["post"=>["security"=>"is_granted('ROLE_ADMIN')"],
    "get"=>["security"=>"is_granted('ROLE_ADMIN')"]]
)]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $theme = null;

    #[ORM\ManyToMany(targetEntity: Mot::class, mappedBy: 'appartenir')]
    private Collection $mots;

    public function __construct()
    {
        $this->mots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, Mot>
     */
    public function getMots(): Collection
    {
        return $this->mots;
    }

    public function addMot(Mot $mot): self
    {
        if (!$this->mots->contains($mot)) {
            $this->mots->add($mot);
            $mot->addAppartenir($this);
        }

        return $this;
    }

    public function removeMot(Mot $mot): self
    {
        if ($this->mots->removeElement($mot)) {
            $mot->removeAppartenir($this);
        }

        return $this;
    }
}
