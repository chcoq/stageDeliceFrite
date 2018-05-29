<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 17/04/2018
 * Time: 15:48
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends Controller
{



    /**
     * @Route("/description/{id}", name="description")
     */
    public function description(Request $request,$id)
    {
        $session = $request->getsession();
        $em = $this->getDoctrine()->getManager();
        $description = $em->getRepository('App:Menu')->find($id);
        if($session->has('panier'))
            $panier = $session ->get('panier');
        else
            $panier=false;
        if (!$description) throw  $this->createNotFoundException('La page n\'existe pas.');

        return $this-> render('description.html.twig',['description' => $description,
                                                             'panier'=>$panier]);
    }

}

/*
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */