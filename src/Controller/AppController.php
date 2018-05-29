<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends  Controller
{
    /**
     * @Route("/accueil", name="homePage")
     */
    public function accueil(Request $request)
    {
        return $this-> render('/Accueil.html.twig');
    }

    /**
     * @Route("/admin/profile", name="navAdmin")
     */
    public function navAdmin(Request $request)
    {
        return $this-> render('admin/navAdmin.html.twig');
    }

}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */