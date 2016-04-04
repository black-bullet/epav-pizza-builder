<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ingredient entity
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int $id ID
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name Name
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="255")
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * @var float $duration
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\Type(type="float")
     */
    private $priceBig;

    /**
     * @var float $duration
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\Type(type="float")
     */
    private $priceMedium;

    /**
     * @var float $duration
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\Type(type="float")
     */
    private $priceSmall;

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name Name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set priceBig
     *
     * @param float $priceBig Price of big
     *
     * @return $this
     */
    public function setPriceBig($priceBig)
    {
        $this->priceBig = $priceBig;

        return $this;
    }

    /**
     * Get priceBig
     *
     * @return float Price of big
     */
    public function getPriceBig()
    {
        return $this->priceBig;
    }

    /**
     * Set priceMedium
     *
     * @param float $priceMedium Price of medium
     *
     * @return $this
     */
    public function setPriceMedium($priceMedium)
    {
        $this->priceMedium = $priceMedium;

        return $this;
    }

    /**
     * Get priceMedium
     *
     * @return float Price of medium
     */
    public function getPriceMedium()
    {
        return $this->priceMedium;
    }

    /**
     * Set priceSmall
     *
     * @param float $priceSmall Price of small
     *
     * @return $this
     */
    public function setPriceSmall($priceSmall)
    {
        $this->priceSmall = $priceSmall;

        return $this;
    }

    /**
     * Get priceSmall
     *
     * @return float Price of small
     */
    public function getPriceSmall()
    {
        return $this->priceSmall;
    }
}
