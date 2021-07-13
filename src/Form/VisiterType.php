<?php

namespace App\Form;

use App\Entity\Moment;
use App\Entity\Musee;
use App\Entity\Visiter;
use App\Repository\MomentRepository;
use App\Repository\MuseeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisiterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nbVisiteurs' , NumberType::class,[
                'label'=> "Nombre de visiteurs "
            ])

            ->add('jour', EntityType::class, [
                'class' => Moment::class,
                'query_builder' => function (MomentRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.jour', 'ASC');
                },
                'choice_label' => 'jour',
            ])

            ->add('submit', SubmitType::class,[
                'label' => "Enrégister"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiter::class,
        ]);
    }
}
