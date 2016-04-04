<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Order;
use AppBundle\Entity\Preset;
use AppBundle\Entity\OrderIngredient;
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
class LoadOrderIngredientData extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return [
            'AppBundle\DataFixtures\ORM\LoadOrderData',
            'AppBundle\DataFixtures\ORM\LoadIngredientData'
        ];
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var Ingredient $ingredient */
        /** @var Order $order */
        $order1 = $this->getReference('order1');
        $order2 = $this->getReference('order2');
        $order3 = $this->getReference('order3');
        $order4 = $this->getReference('order4');
        $order5 = $this->getReference('order5');
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

        $orderIngredient1 = (new OrderIngredient())
            ->setOrder($order1)
            ->setIngredient($ingredient1);
        $manager->persist($orderIngredient1);

        $orderIngredient2 = (new OrderIngredient())
            ->setOrder($order1)
            ->setIngredient($ingredient6);
        $manager->persist($orderIngredient2);

        $orderIngredient3 = (new OrderIngredient())
            ->setOrder($order1)
            ->setIngredient($ingredient4);
        $manager->persist($orderIngredient3);

        $orderIngredient4 = (new OrderIngredient())
            ->setOrder($order2)
            ->setIngredient($ingredient5);
        $manager->persist($orderIngredient4);

        $orderIngredient5 = (new OrderIngredient())
            ->setOrder($order3)
            ->setIngredient($ingredient6);
        $manager->persist($orderIngredient5);

        $orderIngredient6 = (new OrderIngredient())
            ->setOrder($order3)
            ->setIngredient($ingredient7);
        $manager->persist($orderIngredient6);

        $orderIngredient7 = (new OrderIngredient())
            ->setOrder($order4)
            ->setIngredient($ingredient7);
        $manager->persist($orderIngredient7);

        $orderIngredient8 = (new OrderIngredient())
            ->setOrder($order5)
            ->setIngredient($ingredient11);
        $manager->persist($orderIngredient8);

        $orderIngredient9 = (new OrderIngredient())
            ->setOrder($order5)
            ->setIngredient($ingredient6);
        $manager->persist($orderIngredient9);

        $manager->flush();
    }
}