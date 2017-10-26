<?php
/**
 * @license MIT
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Type your new password here',
                ],
            ])
            ->add('confirm_password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Type your new password again',
                ],
            ])
            ->add('user_id', HiddenType::class)
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
        return 'app_bundle_type';
    }
}
