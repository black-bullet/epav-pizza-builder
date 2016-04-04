<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use AppBundle\DBAL\Types\StatusType;

class OrderAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cakeSize', 'text', ['label' => 'Корж'])
            ->add('tableNumber', 'integer', ['label' => 'Номер столика'])
            ->add('presetName', 'text', ['label' => 'Назва збірки'])
            ->add('price', 'integer', ['label' => 'Ціна'])
            ->add('status', 'choice', [
                'choices' => [
                    'PR' => StatusType::PREPARING,
                    'CO' => StatusType::COOKING,
                    'DO' => StatusType::DONE,
                    'IN' => StatusType::IN_CUSTOMER,
                    'CA' => StatusType::CANCELED
                ]])
            ->add('orderIngredients', null, ['label' => 'Інгредієнти']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('cakeSize', null, ['label' => 'Корж'])
            ->add('tableNumber', null, ['label' => 'Номер столика'])
            ->add('presetName', null, ['label' => 'Назва збірки'])
            ->add('price', null, ['label' => 'Ціна']);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('cakeSize', null, ['label' => 'Корж'])
            ->add('tableNumber', null, ['label' => 'Номер столика'])
            ->add('presetName', null, ['label' => 'Назва збірки'])
            ->add('price', null, ['label' => 'Ціна'])
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
            ->add('orderIngredients', null, ['label' => 'Інгредієнти'])
            ->add('status', 'choice', array(
                'choices' => array(
                    'Preparing order' => StatusType::PREPARING,
                ))
                );
    }
}