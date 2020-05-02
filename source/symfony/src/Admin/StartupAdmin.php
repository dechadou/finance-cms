<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Sonata\Form\Type\DateTimePickerType;

final class StartupAdmin extends BaseAbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
            ->add('logo')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion')
            ->add('cierre_ejercicio')
            ->add('fondice')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
            ->add('logo', null, ['template' => 'admin/media/list_image.html.twig'])
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion')
            ->add('cierre_ejercicio')
            ->add('fondice')
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
            ->tab('Informacion principal')
            ->with('')
            ->add('name', null, ['label' => 'Nombre'])
            ->add(
                'logo',
                ModelType::class,
                [
                    'required' => false,
                ]
            )
            ->add('founders', CollectionType::class, ['by_reference' => true], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->add('verticales')
            ->add('description')
            ->add('one_pager')
            ->add('website')
            ->add('fecha_constitucion', DateTimePickerType::class, ['empty_data' => '-'])
            ->add('cierre_ejercicio')
            ->add('fondice')
            ->end()
            ->end()
            ->tab('Mas informacion')
            ->with('')
            ->add('basic', AdminType::class, ['label' => false])
            ->end()
            ->end()
            ->tab('Documentos')
            ->with('')
            ->add('documentos', CollectionType::class, ['by_reference' => true], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->end()
            ->end()
            ->tab('Status')
            ->with('')
            ->add('status', CollectionType::class, [], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->end()
            ->end();
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
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
