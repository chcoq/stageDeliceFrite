<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 11/05/2018
 * Time: 20:22
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends Controller
{
    /**
     * @Route("profile/factures",name="facture")
     */

    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
//        $factures =$this->getDoctrine()->getRepository(Commandes::class)->byFacture($this->getUser());
        $factures = $em->getRepository('App:Commandes')->byFacture($this->getUser());


//        $em = $this->getDoctrine()->getManager();
//        $factures = $em->getRepository(Commandes::class)->byFacture($this->getUser());

        return $this->render('facture.html.twig', ['factures' => $factures]);
    }
}