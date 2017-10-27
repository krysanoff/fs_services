<?php
/**
 * @license MIT
 */

namespace AppBundle\Form;

use AppBundle\Entity\Position;
use AppBundle\Entity\Rank;
use AppBundle\Entity\Shift;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Form class
 */
class EmployeeCreateFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Фамилия',
                'attr' => [
                    'placeholder' => 'Введите фамилию сотрудника',
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Имя',
                'attr' => [
                    'placeholder' => 'Введите имя сотрудника',
                ],
            ])
            ->add('middlename', TextType::class, [
                'label' => 'Отчество',
                'attr' => [
                    'placeholder' => 'Введите отчество сотрудника',
                ],
            ])
            ->add('position', EntityType::class, [
                'class' => Position::class,
                'label' => 'Должность',
            ])
            ->add('rank', EntityType::class, [
                'class' => Rank::class,
                'label' => 'Звание',
            ])
            ->add('shift', EntityType::class, [
                'class' => Shift::class,
                'label' => 'Караул',
            ])
            ->add('image', FileType::class)
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
