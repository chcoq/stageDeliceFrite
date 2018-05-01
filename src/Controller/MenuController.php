<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 17/04/2018
 * Time: 15:48
 */

namespace App\Controller;

use App\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends Controller
{
    /**
     * @Route("/menu", name="menu")
     */
    public function menu(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu

        return $this->render('/menu.html.twig', [
            'menus' => $menus,
            'cats' => $cats
        ]);
    }

    /**
     * @Route("/seul", name="seul")
     */
    public function seul(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu

        return $this-> render('/seul.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats
        ]);
    }

    /**
     * @Route("/americain", name="americain")
     */
    public function americain(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu
        $prods = $em->getRepository('App:Product')->findAll();

        return $this-> render('/americain.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats,
            'prods'=>$prods
        ]);
    }

    /**
     * @Route("/sandwich", name="sandwich")
     */
    public function sandwich(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu
        $prods = $em->getRepository('App:Product')->findAll();

        return $this-> render('/sandwich.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats,
            'prods'=>$prods
        ]);
    }
    /*
     * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
     */

    /**
     * @Route("/description/{id}", name="description")
     */
    public function description($id)
    {
       $em = $this->getDoctrine()->getManager();
       $description = $em->getRepository('App:Menu')->find($id);

       if (!$description) throw  $this->createNotFoundException('La page n\'existe pas.');

        return $this-> render('description.html.twig',['description' => $description]);
    }

}