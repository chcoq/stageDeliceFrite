<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 03/05/2018
 * Time: 15:38
 */

namespace App\Services;


class GetReference
{


    public function __construct($securityContext, $entityManager)
    {
        $this->securityContext = $securityContext;
        $this->em = $entityManager;
    }

    public function reference()
    {
        //on recherche un element et que valider soit a 1 et de prendre le dernier élément
        $reference =$this->em->getRepository('App:Commandes')->findOneBy(array('valider'=>1),array('id'=>'DESC'),1,1);
//si il y pas encore de facture on retourne 1
        if(!$reference)
            return 1;
        else
            //sinon on recupere le dernier élément qu'on incrémente
            return$reference->getReference() +1;
    }
}