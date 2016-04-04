<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\DBAL\Types\StatusType;
use AppBundle\Entity\Order;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * LoadPresetData
 *
 * @author Andy Hobbs <andyhobbs92@gmail.ua>
 */
class LoadOrderData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $order1 = (new Order())
            ->setCakeSize('small')
            ->setTableNumber(1)
            ->setPresetName('Зробив сам')
            ->setPrice(123.5)
            ->setStatus(StatusType::PREPARING);
        $this->setReference('order1', $order1);
        $manager->persist($order1);

        $order2 = (new Order())
            ->setCakeSize('medium')
            ->setTableNumber(3)
            ->setPresetName('Капоне')
            ->setPrice(110)
            ->setStatus(StatusType::IN_CUSTOMER);
        $this->setReference('order2', $order2);
        $manager->persist($order2);

        $order3 = (new Order())
            ->setCakeSize('big')
            ->setTableNumber(9)
            ->setPresetName('Зробив сам')
            ->setPrice(110)
            ->setStatus(StatusType::DONE);
        $this->setReference('order3', $order3);
        $manager->persist($order3);

        $order4 = (new Order())
            ->setCakeSize('big')
            ->setTableNumber(9)
            ->setPresetName('Маргарита')
            ->setPrice(120)
            ->setStatus(StatusType::COOKING);
        $this->setReference('order4', $order4);
        $manager->persist($order4);

        $order5 = (new Order())
            ->setCakeSize('small')
            ->setTableNumber(5)
            ->setPresetName('Зробив сам')
            ->setPrice(80)
            ->setStatus(StatusType::IN_CUSTOMER);
        $this->setReference('order5', $order5);
        $manager->persist($order5);

        $manager->flush();
    }
}