<?php
/**
 * Julien Rajerison <julienrajerison5@gmail.com>.
 **/

namespace App\Form;

use App\Entity\ClassSubject;
use App\Entity\Subject;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ClassSubjectType.
 */
class ClassSubjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'subject',
                EntityType::class,
                [
                    'choice_label'  => 'name',
                    'class'         => Subject::class,
                    'query_builder' => function (EntityRepository $repository) use ($options) {
                        return $repository->createQueryBuilder('c')
                            ->where('c.deletedAt is NULL')
                            ->andWhere('c.etsName = :etsName')
                            ->setParameter('etsName', $options['user'] ? $options['user']->getEtsName() : '');
                    },
                ]
            )
            ->add(
                'coefficient',
                TextType::class,
                [
                    'label' => 'Coefficient',
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClassSubject::class,
            'user'       => null,
        ]);
    }
}
