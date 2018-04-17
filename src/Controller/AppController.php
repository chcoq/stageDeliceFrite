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
//        $menus = $em->getRepository('App:Menu')->findBy(['name'=>'Fricadelle']);
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu


        return $this-> render('/menu.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats
        ]);
    }
        /**
     * @Route("/seul", name="seul")
     */

    public function seul(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
//        $menus = $em->getRepository('App:Menu')->findBy(['name'=>'Fricadelle']);
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu


        return $this-> render('/seul.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats
        ]);
    }

}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */