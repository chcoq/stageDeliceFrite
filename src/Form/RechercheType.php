<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 01/05/2018
 * Time: 16:36
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recherche', TextType::class
            ,array('label'=>false,'attr'=> array('class'=>'form-control mr-sm-2','placeholder'=>'search') )
             );

    }
    public function getName()
    {
        return'recherche';
    }
}