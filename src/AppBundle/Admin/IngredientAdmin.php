<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class IngredientAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', ['label' => 'Назва'])
            ->add('priceSmall', 'text', ['label' => 'Ціна за маленьку порцію'])
            ->add('priceMedium', 'text', ['label' => 'Ціна за середню'])
            ->add('priceBig', 'text', ['label' => 'Ціна за велику'])
            ->add('pictureName', 'text', ['label' => 'Назва зображення'])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name', null, [
            'label' => 'Назва']);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('name', null, ['label' => 'Назва'])
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
            ->add('name', null, ['label' => 'Назва'])
            ->add('priceSmall', null, ['label' => 'Ціна за маленьку порцію'])
            ->add('priceMedium', null, ['label' => 'Ціна за середню'])
            ->add('priceBig', null, ['label' => 'Ціна за велику'])
            ->add('pictureName', null, ['label' => 'Назва зображення']);
    }
}