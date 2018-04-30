<?php

namespace  App\Controller;


use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CategoryMenuController extends  Controller
{
//    /**
//     * @Route("/accueil", name="homePage")
//     */
    public function categoryMenuAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorys = $em->getRepository('App:Category')->findAll();//Select * from Menu


        return $this-> render('NavBar/Menus.html.twig',['categorys'=>$categorys]);
    }

    /**
     * @Route("/menu/{id}", name="category")
     */
    public function menuCategory($id)
    {
//       $em = $this->getDoctrine()->getManager();
//       $menus = $em->getRepository('App:Menu')->byCategoryMenu($category);
        $menus =$this->getDoctrine()
            ->getRepository(Menu::class)
            ->byMenu($id);

        return $this-> render('menu.html.twig',['menus' => $menus]);
    }

}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */