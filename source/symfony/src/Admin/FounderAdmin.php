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
            ->add('name')
            ->add('linkedin')
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET')
            ->add('createdAt')
            ->add('updatedAt');
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('linkedin')
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET')
            ->add('createdBy')
            ->add('updatedBy')
            ->add('updatedAt', 'datetime')
            ->add('createdAt', 'datetime')
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
            ->add('name')
            ->add('linkedin')
            ->add('email')
            ->add('genero',ChoiceType::class,
                [
                    'choices' => [
                        'Peso Argentino' => 'ars',
                        'Dollar' => 'usd',
                        'Euro' => 'euro',
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
            ->add('name')
            ->add('linkedin')
            ->add('email')
            ->add('genero')
            ->add('PHD')
            ->add('CONICET')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
