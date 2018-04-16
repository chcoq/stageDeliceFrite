<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends  Controller
{
    /**
     * @Route("/menu", name="menu")
     */

    public function menu(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('App:Product')->findAll();

        return $this-> render('/menu.html.twig',['produits'=>$produits]);
    }
}