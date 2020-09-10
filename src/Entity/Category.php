<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ApiResource()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @var object
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy ="category")
     */
    private $movies;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMovies(): ?int
    {
        return $this->movies;
    }

    public function setMovies(int $movies): self
    {
        $this->movies = $movies;

        return $this;
    }
}
