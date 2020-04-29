<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class BasicAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow')
            ->add('invertido_gridx')
            ->add('empleados')
            ->add('reformas_estatuto')
            ->add('estatuto')
            ->add('valuacion')
            ->add('registro_acciones_inicial')
            ->add('createdAt')
            ->add('updatedAt')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow')
            ->add('invertido_gridx')
            ->add('empleados')
            ->add('reformas_estatuto')
            ->add('estatuto')
            ->add('valuacion')
            ->add('registro_acciones_inicial')
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
            ->add('batch')
            ->add('inversores')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow')
            ->add('invertido_gridx')
            ->add('empleados')
            ->add('reformas_estatuto')
            ->add('estatuto')
            ->add('valuacion')
            ->add('registro_acciones_inicial')

            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('batch')
            ->add('total_invertido_gridx')
            ->add('invertido_gridx_follow')
            ->add('invertido_gridx')
            ->add('empleados')
            ->add('reformas_estatuto')
            ->add('estatuto')
            ->add('valuacion')
            ->add('registro_acciones_inicial')
            ->add('createdAt')
            ->add('updatedAt')
            ;
    }
}
