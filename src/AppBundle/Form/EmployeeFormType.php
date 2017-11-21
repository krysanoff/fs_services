<?php
/**
 * @license MIT
 */

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use AppBundle\Entity\Position;
use AppBundle\Entity\Rank;
use AppBundle\Entity\Shift;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Form class
 */
class EmployeeFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('middlename', TextType::class)
            ->add('position', EntityType::class, [
                'class' => Position::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.id', 'ASC');
                },
            ])
            ->add('rank', EntityType::class, [
                'class' => Rank::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.id', 'ASC');
                },
            ])
            ->add('shift', EntityType::class, [
                'class' => Shift::class,
            ])
            /*->add('image', FileType::class, [
                'required' => false,
                'label' => 'Фотография',
            ])*/
            ->add('id', HiddenType::class)
            ->add('submit', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Employee::class,
            'translation_domain' => 'admin',
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return '';
    }
}
