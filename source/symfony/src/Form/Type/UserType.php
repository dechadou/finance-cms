<?php
namespace App\Form\Type;

use App\Validator\Constraints\Experiment;
use Doctrine\DBAL\Types\ArrayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Created by PhpStorm.
 * User: juanpablo
 * Date: 2019-03-09
 * Time: 22:26
 */

final class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'constraints' => [
                    ],
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    'constraints' => [
                        new NotBlank(),
                        new Email()
                    ],
                ]
            )
            ->add(
                'password',
                TextType::class,
                [
                    'constraints' => [
                        new NotBlank()
                    ],
                ]
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'csrf_protection' => false,

            ]
        );
    }

}