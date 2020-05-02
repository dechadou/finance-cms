<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Show\ShowMapper;

final class BasicAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow', null, ['label' => 'Follow on'])
            ->add('invertido_gridx')
            ->add('empleados', null, ['label' => 'Cantidad de empleados'])
            ->add('reformas_estatuto', null, ['label' => 'Link a Reformas de Estatuto'])
            ->add('estatuto', null, ['label' => 'Link a estatuto'])
            ->add('valuacion')
            ->add('registro_acciones_inicial', null, ['label' => 'Link a Registro de Acciones Inicial']);
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow', null, ['label' => 'Follow on'])
            ->add('invertido_gridx')
            ->add('empleados', null, ['label' => 'Cantidad de empleados'])
            ->add('reformas_estatuto', null, ['label' => 'Link a Reformas de Estatuto'])
            ->add('estatuto', null, ['label' => 'Link a estatuto'])
            ->add('valuacion')
            ->add('registro_acciones_inicial', null, ['label' => 'Link a Registro de Acciones Inicial'])
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
            ->add('batch', null, ['attr' => ["style" => "width:40%"]])
            ->add('empleados', null, ['label' => 'Cantidad de empleados'])
            ->add('valuacion')
            ->add('inversorStartups', \Sonata\Form\Type\CollectionType::class, ['by_reference' => true, 'label' => 'Inversores', 'required' => false], ['edit' => 'inline', 'inline' => 'table', 'allow_delete' => true])
            ->add('invertido_gridx')
            ->add('invertido_gridx_follow', null, ['label' => 'Follow on'])
            ->add('total_invertido_gridx')
            ->add('estatuto', null, ['label' => 'Link a estatuto'])
            ->add('reformas_estatuto', null, ['label' => 'Link a Reformas de Estatuto'])
            ->add('registro_acciones_inicial', null, ['label' => 'Link a Registro de Acciones Inicial']);
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow', null, ['label' => 'Follow on'])
            ->add('invertido_gridx')
            ->add('empleados', null, ['label' => 'Cantidad de empleados'])
            ->add('reformas_estatuto', null, ['label' => 'Link a Reformas de Estatuto'])
            ->add('estatuto', null, ['label' => 'Link a estatuto'])
            ->add('valuacion')
            ->add('registro_acciones_inicial', null, ['label' => 'Link a Registro de Acciones Inicial'])
            ->add('createdAt')
            ->add('updatedAt');
    }


}
