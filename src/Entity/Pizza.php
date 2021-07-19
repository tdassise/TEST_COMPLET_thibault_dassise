<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pizza")
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 */
class Pizza
{
    /**
     * @var int
     * @ORM\Column(name="id_pizza", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private string $nom;

    /**
     * @var Collection
     */
    private Collection $quantiteIngredients;

    /**
     * @ORM\OneToMany(targetEntity=IngredientPizza::class, mappedBy="pizza")
     */
    private $ingredientPizzas;

    /**
     * @ORM\ManyToOne(targetEntity=Pizzeria::class, inversedBy="pizzas")
     * @ORM\JoinColumn(name="pizzeria_id", referencedColumnName="id_pizzeria")
     */
    private $pizzeria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quantiteIngredients = new ArrayCollection();
        $this->ingredientPizzas = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pizza
     */
    public function setId(int $id): Pizza
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Pizza
     */
    public function setNom(string $nom): Pizza
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @param IngredientPizza $quantiteIngredients
     * @return Pizza
     */
    public function addQuantiteIngredients(IngredientPizza $quantiteIngredients): Pizza
    {
        $this->quantiteIngredients[] = $quantiteIngredients;

        return $this;
    }

    /**
     * @param IngredientPizza $quantiteIngredients
     */
    public function removeQuantiteIngredient(IngredientPizza $quantiteIngredients): void
    {
        $this->quantiteIngredients->removeElement($quantiteIngredients);
    }

    /**
     * @return Collection
     */
    public function getQuantiteIngredients(): Collection
    {
        return $this->quantiteIngredients;
    }

    /**
     * @return Collection|IngredientPizza[]
     */
    public function getIngredientPizzas(): Collection
    {
        return $this->ingredientPizzas;
    }

    public function getPizzeria(): ?Pizzeria
    {
        return $this->pizzeria;
    }

    public function setPizzeria(?Pizzeria $pizzeria): self
    {
        $this->pizzeria = $pizzeria;

        return $this;
    }

    public function getCout()
    {
        $cout = 0;
        foreach ($this->getIngredientPizzas() as $ip) {
            $cout += IngredientPizza::convertirGrammeEnKilo($ip->getQuantite()) * $ip->getIngredient()->getCout();
        }
        return $cout;
    }
}
