<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Sonata\Form\Type\DateTimePickerType;

final class StartupAdmin extends BaseAbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('logo')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion')
            ->add('cierre_ejercicio')
            ->add('fondice')
            ->add('createdAt')
            ->add('updatedAt');
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('logo')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion')
            ->add('cierre_ejercicio')
            ->add('fondice')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->tab('Main')
            ->add('name')
            ->add('logo')
            ->add('founders')
            ->add('verticales')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion', DateTimePickerType::class, ['empty_data' => '-'])
            ->add('cierre_ejercicio', DateTimePickerType::class, ['empty_data' => '-'])
            ->add('fondice')
            ->end()
            ->end()
            ->tab('Basic Information')
            ->add('basic', AdminType::class)
            ->end()
            ->end()
            ->tab('Documentos')
            ->add('documentos', CollectionType::class, ['by_reference' => true], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->end()
            ->end()
            ->tab('Status')
            ->add('status', CollectionType::class, [], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->end()
            ->end();
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('logo')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion')
            ->add('cierre_ejercicio')
            ->add('fondice')
            ->add('createdAt')
            ->add('updatedAt');
    }

    public function updateStatus($object)
    {
        if ($object->getStatus()) {
            foreach ($object->getStatus() as $status) {
                $status->setStartup($object);
            }
        }
    }

    public function persistDocumentos($object)
    {
        if ($object->getDocumentos()) {
            foreach ($object->getDocumentos() as $documento) {
                $documento->setStartup($object);
            }
        }
    }


    public function preUpdate($object)
    {
        $this->updateStatus($object);
        $this->persistDocumentos($object);
        parent::preUpdate($object);

    }

    public function prePersist($object)
    {
        $this->updateStatus($object);
        $this->persistDocumentos($object);
        parent::prePersist($object);
    }
}
