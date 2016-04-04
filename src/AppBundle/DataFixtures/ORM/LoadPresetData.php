<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Preset;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * LoadPresetData
 *
 * @author Andy Hobbs <andyhobbs92@gmail.ua>
 */
class LoadPresetData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $preset1 = (new Preset())
            ->setName('Зробив сам');
        $this->setReference('preset1', $preset1);
        $manager->persist($preset1);

        $preset2 = (new Preset())
            ->setName('Капоне');
        $this->setReference('preset2', $preset2);
        $manager->persist($preset2);

        $preset3 = (new Preset())
            ->setName('Маргарита');
        $this->setReference('preset3', $preset3);
        $manager->persist($preset3);

        $preset4 = (new Preset())
            ->setName('Чілінтано');
        $this->setReference('preset4', $preset4);
        $manager->persist($preset4);

        $manager->flush();
    }
}