<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Preset;
use AppBundle\Entity\PresetIngredient;
use AppBundle\DataFixtures\ORM\LoadPresetData;
use AppBundle\DataFixtures\ORM\LoadIngredientData;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * LoadPresetIngredientData
 *
 * @author Andy Hobbs <andyhobbs92@gmail.ua>
 */
class LoadPresetIngredientData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            'AppBundle\DataFixtures\ORM\LoadIngredientData',
            'AppBundle\DataFixtures\ORM\LoadPresetData'
        ];
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var Ingredient $ingredient */
        /** @var Preset $preset */
        $preset1 = $this->getReference('preset1');
        $preset2 = $this->getReference('preset2');
        $preset3 = $this->getReference('preset3');
        $preset4 = $this->getReference('preset4');
        $ingredient1 = $this->getReference('ingredient1');
        $ingredient2 = $this->getReference('ingredient2');
        $ingredient3 = $this->getReference('ingredient3');
        $ingredient4 = $this->getReference('ingredient4');
        $ingredient5 = $this->getReference('ingredient5');
        $ingredient6 = $this->getReference('ingredient6');
        $ingredient7 = $this->getReference('ingredient7');
        $ingredient8 = $this->getReference('ingredient8');
        $ingredient9 = $this->getReference('ingredient9');
        $ingredient10 = $this->getReference('ingredient10');
        $ingredient11 = $this->getReference('ingredient11');
        $ingredient12 = $this->getReference('ingredient12');

        $presetIngredient1 = (new PresetIngredient())
            ->setPreset($preset1)
            ->setIngredient($ingredient1);
        $manager->persist($presetIngredient1);

        $presetIngredient2 = (new PresetIngredient())
            ->setPreset($preset1)
            ->setIngredient($ingredient5);
        $manager->persist($presetIngredient2);

        $presetIngredient3 = (new PresetIngredient())
            ->setPreset($preset1)
            ->setIngredient($ingredient12);
        $manager->persist($presetIngredient3);

        $presetIngredient4 = (new PresetIngredient())
            ->setPreset($preset2)
            ->setIngredient($ingredient1);
        $manager->persist($presetIngredient4);

        $presetIngredient5 = (new PresetIngredient())
            ->setPreset($preset2)
            ->setIngredient($ingredient2);
        $manager->persist($presetIngredient5);

        $presetIngredient6 = (new PresetIngredient())
            ->setPreset($preset2)
            ->setIngredient($ingredient11);
        $manager->persist($presetIngredient6);

        $presetIngredient7 = (new PresetIngredient())
            ->setPreset($preset2)
            ->setIngredient($ingredient6);
        $manager->persist($presetIngredient7);

        $presetIngredient8 = (new PresetIngredient())
            ->setPreset($preset2)
            ->setIngredient($ingredient4);
        $manager->persist($presetIngredient8);

        $presetIngredient9 = (new PresetIngredient())
            ->setPreset($preset3)
            ->setIngredient($ingredient5);
        $manager->persist($presetIngredient9);

        $presetIngredient10 = (new PresetIngredient())
            ->setPreset($preset3)
            ->setIngredient($ingredient7);
        $manager->persist($presetIngredient10);

        $presetIngredient11 = (new PresetIngredient())
            ->setPreset($preset3)
            ->setIngredient($ingredient11);
        $manager->persist($presetIngredient11);

        $presetIngredient12 = (new PresetIngredient())
            ->setPreset($preset3)
            ->setIngredient($ingredient12);
        $manager->persist($presetIngredient12);

        $presetIngredient13 = (new PresetIngredient())
            ->setPreset($preset4)
            ->setIngredient($ingredient1);
        $manager->persist($presetIngredient13);

        $presetIngredient14 = (new PresetIngredient())
            ->setPreset($preset4)
            ->setIngredient($ingredient5);
        $manager->persist($presetIngredient14);

        $presetIngredient15 = (new PresetIngredient())
            ->setPreset($preset4)
            ->setIngredient($ingredient11);
        $manager->persist($presetIngredient15);

        $presetIngredient16 = (new PresetIngredient())
            ->setPreset($preset4)
            ->setIngredient($ingredient10);
        $manager->persist($presetIngredient16);

        $manager->flush();
    }
}