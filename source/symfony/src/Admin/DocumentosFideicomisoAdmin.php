<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Sonata\Form\Type\DateTimePickerType;

final class DocumentosFideicomisoAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ;
    }

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
            ->add('source', null, ['label' => 'Fuente'])
            ->add('date', DateTimePickerType::class, ['label' => 'Fecha de publicacion', 'required' => false, 'format' => 'dd/MM/y'])
            ->add('value', null, ['label' => 'Link al documento']);
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre del documento'])
            ->add('value', null, ['label' => 'Link al documento']);
    }

    public function prePersist($object)
    {
        $object->setCreatedAt();
        $object->setUpdatedAt();
        parent::prePersist($object); // TODO: Change the autogenerated stub
    }

    public function preUpdate($object)
    {
        $object->setUpdatedAt();
        parent::preUpdate($object); // TODO: Change the autogenerated stub
    }
}
