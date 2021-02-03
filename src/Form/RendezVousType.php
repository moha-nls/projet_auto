<?php

namespace App\Form;

use App\Entity\RendezVous;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Service')
            ->add('dateRdv', DateType::class, [
                'widget' => 'single_text',
                'years' => range(2021,2031),
                "attr" => [
                    'class' => 'js-datepicker',
                ],
                'label' => 'Date de Reservation :'

            ])
            ->add('heureRdv',TimeType::class, [
                'hours' => range(9, 18),
                'label' => 'Heure de Reservation :'
            ])

            ->add('immatriculation', TextType::class, [
                "attr" => [
                    "size" => 15,
                ]
            ])

            ->add('prixRdv', HiddenType::class, [
                'empty_data' => '10',
            ])

            ->add('createdAt', HiddenType::class)

            ->add('save', SubmitType::class, ['label' => 'Valider RDV'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
