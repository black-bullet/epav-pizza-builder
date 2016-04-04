<?php

namespace MainBundle\DataFixtures\ORM;

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
            ->setName('Маргарита');
        $this->setReference('', $preset1);
        $manager->persist($preset1);

        $preset2 = (new Preset())
            ->setName('Капоне');
        $this->setReference('', $preset2);
        $manager->persist($preset2);

        $preset3 = (new Preset())
            ->setName('Зробив сам');
        $this->setReference('', $preset3);
        $manager->persist($preset3);

        $preset4 = (new Preset())
            ->setName('Гавайська');
        $this->setReference('', $preset4);
        $manager->persist($preset4);

        $preset5 = (new Preset())
            ->setName('Капрічіоза');
        $this->setReference('', $preset5);
        $manager->persist($preset5);

        $manager->flush();
    }
}