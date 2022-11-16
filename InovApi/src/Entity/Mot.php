<?php

namespace App\Entity;

use App\Repository\MotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MotRepository::class)]
#[ApiResource(
    normalizationContext:['groups' => ['read']],
    itemOperations: ["get"=>["security"=>"is_granted('ROLE_USER')"],
        "patch"=>["security"=>"is_granted('ROLE_ADMIN')"]],
    collectionOperations: ["post"=>["security"=>"is_granted('ROLE_ADMIN')"],
    "get"=>["security"=>"is_granted('ROLE_ADMIN')"]]
)]
class Mot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(["read"])]
    #[ORM\Column(length: 100)]
    private ?string $motAnglais = null;

    #[Groups(["read"])]
    #[ORM\Column(length: 100)]
    private ?string $motFrancais = null;

    #[ORM\ManyToMany(targetEntity: Liste::class, inversedBy: 'mots')]
    private Collection $appartenir;

    public function __construct()
    {
        $this->appartenir = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotAnglais(): ?string
    {
        return $this->motAnglais;
    }

    public function setMotAnglais(string $motAnglais): self
    {
        $this->motAnglais = $motAnglais;

        return $this;
    }

    public function getMotFrancais(): ?string
    {
        return $this->motFrancais;
    }

    public function setMotFrancais(string $motFrancais): self
    {
        $this->motFrancais = $motFrancais;

        return $this;
    }

    /**
     * @return Collection<int, Liste>
     */
    public function getAppartenir(): Collection
    {
        return $this->appartenir;
    }

    public function addAppartenir(Liste $appartenir): self
    {
        if (!$this->appartenir->contains($appartenir)) {
            $this->appartenir->add($appartenir);
        }

        return $this;
    }

    public function removeAppartenir(Liste $appartenir): self
    {
        $this->appartenir->removeElement($appartenir);

        return $this;
    }
}
