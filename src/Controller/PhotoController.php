<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PhotoController extends  Controller
{
    /**
     * @Route("/Photo", name="photo")
     */
    public function accueil(Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $photos = $em->getRepository('App:Image')->findAll();
        return $this-> render('/photo.html.twig',['photos'=>$photos]);
    }

//    /**
//     * @Route("/admin", name="navAdmin")
//     */
//    public function navAdmin(Request $request)
//    {
//        return $this-> render('admin/navAdmin.html.twig');
//    }

}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */