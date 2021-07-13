<?php

namespace App\Form;

use App\Entity\Musee;
use App\Entity\Pays;
use App\Repository\PaysRepository;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MuseeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numMus' , TextType::class, [
                'label' => 'Numero du musée'
            ])
            ->add('nomMus', TextType::class, [
                'label' => 'Nom  du musée'
            ])
            ->add('nbLivres', IntegerType::class, [
                'label' => 'Nombre  de  musée'
            ])
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                /*'query_builder' => function (PaysRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.codePays', 'ASC');
                },*/
                'choice_label' => 'codePays',
            ])

            ->add('submit', SubmitType::class,[
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Musee::class,
        ]);
    }
}
