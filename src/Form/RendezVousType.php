<?php

namespace App\Form;

use App\Entity\RendezVous;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Factory\Cache\ChoiceFieldName;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                'years' => range(2021,2031)

            ])
            ->add('heureRdv',TimeType::class, [

                'hours' => range(9, 18),
            ])

            ->add('immatriculation')

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
