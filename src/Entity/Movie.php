<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          }
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          }
 *     },
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "title": "partial",
 *     "filmGenre": "partial",
 *     "filmDirector": "partial",
 *     "price": "partial",
 *     "createdAt": "partial",
 * })
 * @ApiFilter(RangeFilter::class, properties={"price"})
 * @ApiFilter(PropertyFilter::class)
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"movie:read", "movie:write"})
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"movie:read", "movie:write"})
     * @Assert\NotBlank()
     */
    private $filmGenre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"movie:read", "movie:write"})
     * @SerializedName("filmDirector")
     * @Assert\NotBlank()
     */
    private $filmDirector;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"movie:read", "movie:write"})
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"movie:read", "movie:write"})
     * @Assert\NotBlank()
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFilmGenre(): ?string
    {
        return $this->filmGenre;
    }

    public function setFilmGenre(string $filmGenre): self
    {
        $this->filmGenre = $filmGenre;

        return $this;
    }

    public function getFilmDirector(): ?string
    {
        return $this->filmDirector;
    }

    public function setFilmDirector(?string $filmDirector): self
    {
        $this->filmDirector = $filmDirector;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
