<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PresetIngredient class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 *
 * @ORM\Table(name="presets_to_ingredients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresetIngredientRepository")
 */
class PresetIngredient
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
     * @var Preset $preset Preset
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Preset", inversedBy="presetIngredients")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     */
    private $preset;

    /**
     * @var Ingredient $ingredient Ingredient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient", inversedBy="presetIngredients")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     * @Assert\NotBlank()
     */
    private $ingredient;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set preset
     *
     * @param Preset $preset Preset
     *
     * @return $this
     */
    public function setPreset(Preset $preset)
    {
        $this->preset = $preset;

        return $this;
    }

    /**
     * Get preset
     *
     * @return Preset Preset
     */
    public function getPreset()
    {
        return $this->preset;
    }

    /**
     * Set ingredient
     *
     * @param Ingredient $ingredient Ingredient
     *
     * @return $this
     */
    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get ingredient
     *
     * @return Ingredient Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
}
