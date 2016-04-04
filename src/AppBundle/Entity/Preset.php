<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Preset class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="presets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresetRepository")
 */
class Preset
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
     * @var ArrayCollection|PresetIngredient[] $presetIngredients Preset Ingredients
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PresetIngredient", mappedBy="preset", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * Constructor
     */
    public function __construct()
    {
        $this->eventGroups = new ArrayCollection();
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
     * Set preset ingredients
     *
     * @param ArrayCollection|PresetIngredient[] $presetIngredients Preset Ingredient
     *
     * @return $this
     */
    public function setPresetIngredients(ArrayCollection $presetIngredients)
    {
        foreach ($presetIngredients as $presetIngredient) {
            $presetIngredient->setPreset($this);
        }
        $this->presetIngredients = $presetIngredients;

        return $this;
    }

    /**
     * Add presetIngredients
     *
     * @param PresetIngredient $presetIngredients Preset Ingredient
     *
     * @return $this
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
     * @return ArrayCollection|PresetIngredient[] Preset Ingredient
     */
    public function getPresetIngredients()
    {
        return $this->presetIngredients;
    }

    /**
     * To string
     *
     * @return string
     */
    public function __toString()
    {
        $result = 'New Preset';
        if (null !== $this->getName()) {
            $result = $this->getName();
        }
        return $result;
    }
}
