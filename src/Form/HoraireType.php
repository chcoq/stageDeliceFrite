<?php

namespace App\Form;

use App\Entity\Horaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jour')
            ->add('midiDebut',TimeType::class,array('label'=>'Ouverture midi'))
            ->add('midifin',TimeType::class,array('label'=>'Fermeture midi'))
            ->add('soirdebut',TimeType::class,array('label'=>'Ouverture soir'))
            ->add('soirfin',TimeType::class,array('label'=>'Fermeture soir'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Horaire::class,
        ]);
    }
}
