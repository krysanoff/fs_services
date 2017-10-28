<?php
/**
 * @license MIT
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Form class
 */
class UserFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Your username',
                'attr' => [
                    'placeholder' => 'Type your new username here',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The passwords must match',
                'first_name' => 'password',
                'first_options' => [
                    'label' => 'New password',
                    'attr' => [
                        'placeholder' => 'Type your new password here',
                    ],
                ],
                'second_name' => 'confirm_password',
                'second_options' => [
                    'label' => 'Confirm password',
                    'attr' => [
                        'placeholder' => 'Type your new password again',
                    ],
                ],
            ])
            ->add('user_id', HiddenType::class)
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary btn-success',
                ],
            ])
            ->add('cancel', ResetType::class, [
                'attr' => [
                    'class' => 'btn btn-default btn-reset'
                ]
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        return;
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return '';
    }
}
