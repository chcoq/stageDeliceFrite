<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 09:21
 */

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('Nom')
            ->add('Prenom',TextType::class,array('required'=>false))
            ->add('sexe',ChoiceType::class,array('choices'=> array('Femme' => '0',
                                                                               'Homme' => '1'),
                                                            'expanded'=>true,
                                                            'preferred_choices'=>array('0')))
            ->add('Age',DateType::class, array('widget' => 'single_text',))
            ->add('Pays',CountryType::class,array('preferred_choices'=>array('FR','GB')))
            ->add('Adresse')
            ->add('CodePostal')
            ->add('DateDe_Naissance')
            ->add('Produits',EntityType::class,array('class' =>'App\Entity\Product' ))
            ->add('Envoyer',SubmitType::class);

    }
    public function getName()
    {
        return'test';
    }

}