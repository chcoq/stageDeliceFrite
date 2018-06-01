<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class InfoController extends  Controller
{
    /**
     * @Route("/information", name="info")
     */
    public function info(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $horaires = $em->getRepository('App:Horaire')->findAll();
        $paiements = $em->getRepository('App:Config')->findAll();

        return $this-> render('/info.html.twig',['horaires'=>$horaires,
                                                       'paiements'=>$paiements]);
    }



}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */