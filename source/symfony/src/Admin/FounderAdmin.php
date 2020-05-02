<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Show\ShowMapper;

final class FounderAdmin extends BaseAbstractAdmin
{
    public static function getGenreChoice()
    {
        return [
            'masculino' => 'Masculino',
            'femenino' => 'Femenino',
        ];
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
            ->add('linkedin', null, ['label' => 'Link a perfil de Linkedin'])
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET');
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
            ->add('linkedin', null, ['label' => 'Link a perfil de Linkedin'])
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET')
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
            ->add('name', null, ['label' => 'Nombre'])
            ->add('linkedin', null, ['label' => 'Link a perfil de Linkedin'])
            ->add('email')
            ->add('genero',ChoiceType::class,
                [
                    'choices' => [
                        'Masculino' => 'masculino',
                        'Femenino' => 'femenino',
                        'Otro' => 'otro',
                    ],
                ]
            )
            ->add('PHD')
            ->add('CONICET');
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nombre'])
            ->add('linkedin', null, ['label' => 'Link a perfil de Linkedin'])
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET')
            ->add('createdAt')
            ->add('updatedAt');
    }
}

