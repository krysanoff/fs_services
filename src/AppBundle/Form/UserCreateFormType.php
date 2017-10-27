<?php
/**
 * @license MIT
 */

namespace AppBundle\Form;

use AppBundle\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Form class
 */
class UserCreateFormType extends AbstractType
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
                    'placeholder' => 'Type your username here',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The passwords must match',
                'first_name' => 'password',
                'first_options' => [
                    'label' => 'Your password',
                    'attr' => [
                        'placeholder' => 'Type your password here',
                    ],
                ],
                'second_name' => 'confirm_password',
                'second_options' => [
                    'label' => 'Confirm password',
                    'attr' => [
                        'placeholder' => 'Type your password again',
                    ],
                ],
            ])
            ->add('user_id', HiddenType::class)
            ->add('role_id', EntityType::class, [
                'class' => Role::class,
                'attr' => [
                    'value' => 1
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-lg btn-success btn-block',
                ],
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
