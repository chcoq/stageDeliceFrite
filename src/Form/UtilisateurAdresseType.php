<?php

namespace App\Form;

use App\Entity\UtilisateursAdresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurAdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('telephone',TextType::class)
            ->add('adresse',TextType::class)
            ->add('cp',TextType::class)
            ->add('ville',TextType::class)
            ->add('pays',TextType::class)
            ->add('complement', null, array('required' => false))
            ->add('add', SubmitType::class, array('attr' => array('class' => 'btn btn-primary')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UtilisateursAdresses::class,
        ]);
    }
}
