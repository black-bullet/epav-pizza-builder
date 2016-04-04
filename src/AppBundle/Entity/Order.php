<?php

namespace AppBundle\Entity;

use AppBundle\DBAL\Types\StatusType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * Order class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 */
class Order
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
     * @var ArrayCollection|OrderIngredient[] $orderIngredients Order Ingredients
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderIngredient", mappedBy="order", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orderIngredients;

    /**
     * @var string $cakeSize Cake size
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="255")
     * @Assert\Type(type="string")
     */
    private $cakeSize;

    /**
     * @var int $tableNumber Table number
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $tableNumber;

    /**
     * @var string $presetName Preset name
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $presetName;

    /**
     * @var int $price Price
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $price;

    /**
     * @var StatusType $status Status Type
     *
     * @ORM\Column(name="position", type="StatusType", nullable=false)
     * @DoctrineAssert\Enum(entity="AppBundle\DBAL\Types\StatusType")
     */
    private $status;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderIngredients = new ArrayCollection();
    }

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
     * Set cakeSize
     *
     * @param string $cakeSize Cake size
     *
     * @return $this
     */
    public function setCakeSize($cakeSize)
    {
        $this->cakeSize = $cakeSize;

        return $this;
    }

    /**
     * Get cakeSize
     *
     * @return string Cake size
     */
    public function getCakeSize()
    {
        return $this->cakeSize;
    }

    /**
     * Set tableNumber
     *
     * @param int $tableNumber Table number
     *
     * @return $this
     */
    public function setTableNumber($tableNumber)
    {
        $this->tableNumber = $tableNumber;

        return $this;
    }

    /**
     * Get tableNumber
     *
     * @return int Table number
     */
    public function getTableNumber()
    {
        return $this->tableNumber;
    }

    /**
     * Set presetName
     *
     * @param string $presetName Preset Name
     *
     * @return Order
     */
    public function setPresetName($presetName)
    {
        $this->presetName = $presetName;

        return $this;
    }

    /**
     * Get presetName
     *
     * @return string Preset name
     */
    public function getPresetName()
    {
        return $this->presetName;
    }

    /**
     * Set price
     *
     * @param int $price Price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param StatusType $status Status Type
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return StatusType Status Type
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set order ingredients
     *
     * @param ArrayCollection|OrderIngredient[] $orderIngredients Order Ingredient
     *
     * @return $this
     */
    public function setPresetIngredients(ArrayCollection $orderIngredients)
    {
        foreach ($orderIngredients as $orderIngredient) {
            $orderIngredient->setOrder($this);
        }
        $this->orderIngredients = $orderIngredients;

        return $this;
    }

    /**
     * Add orderIngredients
     *
     * @param OrderIngredient $orderIngredients Order Ingredient
     *
     * @return $this
     */
    public function addOrderIngredient(OrderIngredient $orderIngredients)
    {
        $this->orderIngredients[] = $orderIngredients;

        return $this;
    }

    /**
     * Remove orderIngredients
     *
     * @param OrderIngredient $orderIngredients Order Ingredient
     */
    public function removeOrderIngredient(OrderIngredient $orderIngredients)
    {
        $this->orderIngredients->removeElement($orderIngredients);
    }

    /**
     * Get orderIngredients
     *
     * @return ArrayCollection
     */
    public function getOrderIngredients()
    {
        return $this->orderIngredients;
    }
}
