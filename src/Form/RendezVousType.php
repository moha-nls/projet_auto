<?php

namespace App\Form;

use App\Entity\RendezVous;
use Symfony\Component\Form\AbstractType;
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
            ->add('Service',null, [
                "label" => 'Choisir le type de Service',

            ])
            ->add('dateRdv')
            ->add('heureRdv',TimeType::class, [

                'hours' => range(9, 18),
            ])
            ->add('dateRdv')
            ->add('immatriculation')
            ->add('carteGrise')

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
