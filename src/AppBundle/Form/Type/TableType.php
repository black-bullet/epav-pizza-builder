<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * TableType class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class TableType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'choice', [
                'label'   => 'Номер столу',
                'choices' => [
                    1  => 1,
                    2  => 2,
                    3  => 3,
                    4  => 4,
                    5  => 5,
                    6  => 6,
                    7  => 7,
                    8  => 8,
                    9  => 9,
                    10 => 10,
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'table';
    }
}
