<?php
/**
 * Created by PhpStorm.
 * User: juanpablo
 * Date: 2019-03-28
 * Time: 19:33
 */

namespace App\Form\Type;

use App\Entity\Labs\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class,
                [
                    'constraints' =>
                        [
                        ]
                ])
            ->add('name', TextType::class,
                [
                'constraints' =>
                    [
                        new NotBlank([
                            'message' => 'Name blank',
                        ]
                        ),
                        new Length([
                            'min' => 1,
                            'minMessage' => 'Name',
                            'max' => 4096,
                        ]),
                    ]
                ])
            ->add('password', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'data_class' => User::class
        ]);
    }
}