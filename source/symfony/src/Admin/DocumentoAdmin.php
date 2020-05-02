<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class DocumentoAdmin extends BaseAbstractAdmin
{

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('type', null, ['label' => 'Tipo de documento'])
            ->add('name', null, ['label' => 'Nombre del documento'])
            ->add('value', null, ['label' => 'Link al documento'])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
                'label' => 'Accion'
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('type', null, ['label' => 'Tipo de documento'])
            ->add('name', null, ['label' => 'Nombre del documento'])
            ->add('value', null, ['label' => 'Link al documento'])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre del documento'])
            ->add('value', null, ['label' => 'Link al documento'])
            ;
    }
}
