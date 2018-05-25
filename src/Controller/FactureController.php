<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 11/05/2018
 * Time: 20:22
 */

namespace App\Controller;

use Spipu\html2pdf\src;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends Controller
{
    /**
     * @Route("profile/factures",name="facture")
     */

    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('App:Commandes')->byFacture($this->getUser());



        return $this->render('facture.html.twig', ['factures' => $factures]);



    }

    /**
     * @Route("profile/factures/pdf/{id}",name="facturePDF")
     */
    public function facturePDF($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('App:Commandes')->findOneBy(['user'=>$this->getUser()->getUsername(),
                                                                              'valider'=>1,
                                                                              'id'=>$id]);

        if(!$facture){
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('facture'));
        }
        $html = $this->renderView('pdf.html.twig',array('facture'=>$facture));
//        dump($facture);
//        die('valeur');
        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('Delice Frites');
        $html2pdf->pdf->SetTitle('Facture '.$facture->getReference());
        $html2pdf->pdf->SetSubject('Facture Delice Frites');
//        $html2pdf->pdf->SetKeywords('facture,deliceFrites');

        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('Facture.pdf');

        $response =  new Response();
        $response->headers->set('Content-type','application/pdf');

        return $response;








    }
}