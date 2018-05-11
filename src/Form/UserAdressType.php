<?php

namespace App\Form;

use App\Entity\UserAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('phone')
            ->add('adress')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('complement',null,array('required'=>false))
            ->add('add',SubmitType::class,array('attr'=> array('class'=>'btn btn-primary')))
//            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserAdress::class,
        ]);
    }
}
