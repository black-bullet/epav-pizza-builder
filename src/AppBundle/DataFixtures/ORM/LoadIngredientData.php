<?php

namespace MainBundle\DataFixtures\ORM;

use AppBundle\Entity\Ingredient;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * LoadIngredientData
 *
 * @author Andy Hobbs <andyhobbs92@gmail.ua>
 */
class LoadIngredientData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $ingredient1 = (new Ingredient())
            ->setName('Салямі')
            ->setPriceSmall(7)
            ->setPriceMedium(14)
            ->setPriceBig(28)
            ->setLayer(1);
        $this->setReference('', $ingredient1);
        $manager->persist($ingredient1);

        $ingredient2 = (new Ingredient())
            ->setName('Мисливські ковбаски')
            ->setPriceSmall(9.5)
            ->setPriceMedium(19)
            ->setPriceBig(38)
            ->setLayer(2);
        $this->setReference('', $ingredient2);
        $manager->persist($ingredient2);

        $ingredient3 = (new Ingredient())
            ->setName('Курка')
            ->setPriceSmall(7)
            ->setPriceMedium(14)
            ->setPriceBig(28)
            ->setLayer(3);
        $this->setReference('', $ingredient3);
        $manager->persist($ingredient3);

        $ingredient4 = (new Ingredient())
            ->setName('Перець болгарський')
            ->setPriceSmall(5.5)
            ->setPriceMedium(11)
            ->setPriceBig(22)
            ->setLayer(4);
        $this->setReference('', $ingredient4);
        $manager->persist($ingredient1);

        $ingredient5 = (new Ingredient())
            ->setName('Помідори')
            ->setPriceSmall(5)
            ->setPriceMedium(10)
            ->setPriceBig(20)
            ->setLayer(5);
        $this->setReference('', $ingredient5);
        $manager->persist($ingredient5);

        $ingredient6 = (new Ingredient())
            ->setName('Бекон')
            ->setPriceSmall(7)
            ->setPriceMedium(9)
            ->setPriceBig(11)
            ->setLayer(6);
        $this->setReference('', $ingredient6);
        $manager->persist($ingredient6);

        $ingredient7 = (new Ingredient())
            ->setName('Базилік')
            ->setPriceSmall(2.75)
            ->setPriceMedium(4.5)
            ->setPriceBig(9)
            ->setLayer(7);
        $this->setReference('', $ingredient7);
        $manager->persist($ingredient7);

        $ingredient8 = (new Ingredient())
            ->setName('Ананас')
            ->setPriceSmall(5)
            ->setPriceMedium(10)
            ->setPriceBig(20)
            ->setLayer(8);
        $this->setReference('', $ingredient8);
        $manager->persist($ingredient8);

        $ingredient9 = (new Ingredient())
            ->setName('Кукуруза')
            ->setPriceSmall(4.5)
            ->setPriceMedium(9)
            ->setPriceBig(18)
            ->setLayer(9);
        $this->setReference('', $ingredient9);
        $manager->persist($ingredient9);

        $ingredient10 = (new Ingredient())
            ->setName('Гриби')
            ->setPriceSmall(4.5)
            ->setPriceMedium(9)
            ->setPriceBig(18)
            ->setLayer(10);
        $this->setReference('', $ingredient10);
        $manager->persist($ingredient10);

        $ingredient11 = (new Ingredient())
            ->setName('Пармезан')
            ->setPriceSmall(8)
            ->setPriceMedium(16)
            ->setPriceBig(32)
            ->setLayer(11);
        $this->setReference('', $ingredient11);
        $manager->persist($ingredient11);

        $ingredient12 = (new Ingredient())
            ->setName('Моцарелла')
            ->setPriceSmall(6.5)
            ->setPriceMedium(13)
            ->setPriceBig(26)
            ->setLayer(12);
        $this->setReference('', $ingredient12);
        $manager->persist($ingredient12);

        $manager->flush();
    }
}