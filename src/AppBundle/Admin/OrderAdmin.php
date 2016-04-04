<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cakeSize', 'text', ['label' => 'Корж']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('cakeSize', null, ['label' => 'Корж']);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('cakeSize', null, ['label' => 'Корж'])
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
                'label'=>'Дії'
            ));
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('cakeSize', null, ['label' => 'Корж'])
            ->add('tableNumber', null, ['label' => 'Номер столика'])
            ->add('presetName', null, ['label' => 'Назва збірки'])
            ->add('price', null, ['label' => 'Ціна'])
            ->add('status', null, ['label' => 'Статус замовлення']);
    }
}