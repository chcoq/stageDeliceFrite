<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends  Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function accueil(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contacts = $em->getRepository('App:Config')->findAll();
//        dump($contacts);
//        die();
        return $this->render('/Contact.html.twig', ['contacts' => $contacts]);
    }
}