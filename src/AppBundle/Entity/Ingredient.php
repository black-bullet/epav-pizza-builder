<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ArrayCollection|OrderIngredient[] $orderIngredients Order Ingredients
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderIngredient", mappedBy="ingredient", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $orderIngredients;

    /**
     * @var ArrayCollection|PresetIngredient[] $presetIngredients Preset Ingredients
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PresetIngredient", mappedBy="ingredient", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $presetIngredients;

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
     * @var float $priceBig Price of big
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $priceBig;

    /**
     * @var float $priceMedium Price of medium
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $priceMedium;

    /**
     * @var float $priceSmall Price of small
     *
     * @ORM\Column(type="float", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $priceSmall;

    /**
     * @var int $layer Layer
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $layer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->presetIngredients = new ArrayCollection();
        $this->orderIngredients  = new ArrayCollection();
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

    /**
     * Set layer
     *
     * @param int $layer Layer
     *
     * @return $this
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;

        return $this;
    }

    /**
     * Get layer
     *
     * @return int Layer
     */
    public function getLayer()
    {
        return $this->layer;
    }

    /**
     * Set preset ingredients
     *
     * @param ArrayCollection|PresetIngredient[] $presetIngredients Preset Ingredient
     *
     * @return $this
     */
    public function setPresetIngredients(ArrayCollection $presetIngredients)
    {
        foreach ($presetIngredients as $presetIngredient) {
            $presetIngredient->setIngredient($this);
        }
        $this->presetIngredients = $presetIngredients;

        return $this;
    }

    /**
     * Add presetIngredients
     *
     * @param PresetIngredient $presetIngredients Preset Ingredient
     *
     * @return Ingredient Ingredient
     */
    public function addPresetIngredient(PresetIngredient $presetIngredients)
    {
        $this->presetIngredients[] = $presetIngredients;

        return $this;
    }

    /**
     * Remove presetIngredients
     *
     * @param PresetIngredient $presetIngredients Preset Ingredient
     */
    public function removePresetIngredient(PresetIngredient $presetIngredients)
    {
        $this->presetIngredients->removeElement($presetIngredients);
    }

    /**
     * Get presetIngredients
     *
     * @return ArrayCollection
     */
    public function getPresetIngredients()
    {
        return $this->presetIngredients;
    }

    /**
     * Set preset ingredients
     *
     * @param ArrayCollection|PresetIngredient[] $presetIngredients Preset Ingredient
     *
     * @return $this
     */
    public function setOrderIngredients(ArrayCollection $presetIngredients)
    {
        foreach ($presetIngredients as $presetIngredient) {
            $presetIngredient->setIngredient($this);
        }
        $this->presetIngredients = $presetIngredients;

        return $this;
    }

    /**
     * Add orderIngredients
     *
     * @param OrderIngredient $orderIngredients Order Ingredient
     *
     * @return Ingredient
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
