<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: TestRepository::class)]
#[ApiResource(
    itemOperations: ["get"=>["security"=>"is_granted('ROLE_USER')"],
        "patch"=>["security"=>"is_granted('ROLE_ADMIN')"]],
    collectionOperations: ["post"=>["security"=>"is_granted('ROLE_ADMIN')"],
    "get"=>["security"=>"is_granted('ROLE_USER')"]]
)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $niveau = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Liste $lier = null;

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: Resultat::class)]
    private Collection $resultats;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getLier(): ?Liste
    {
        return $this->lier;
    }

    public function setLier(?Liste $lier): self
    {
        $this->lier = $lier;

        return $this;
    }

    /**
     * @return Collection<int, Resultat>
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultat $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats->add($resultat);
            $resultat->setTest($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->removeElement($resultat)) {
            // set the owning side to null (unless already changed)
            if ($resultat->getTest() === $this) {
                $resultat->setTest(null);
            }
        }

        return $this;
    }

}
