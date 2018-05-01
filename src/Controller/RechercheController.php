<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 01/05/2018
 * Time: 16:20
 */

namespace App\Controller;


use App\Entity\Menu;
use App\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends Controller
{

    public function recherche()
    {
        $form= $this->createForm(RechercheType::class);
        return $this->render('/Recherche/recherche.html.twig',array('form'=>$form->createView(),));
    }


    /**
     * @Route("/recheche", name="rechercheMenu")
     */
    public function rechercheTraitement(Request $request)
    {
        $form= $this->createForm(RechercheType::class);


        if($request ->isMethod('POST') )
        {
            $form->submit($request->request->get($form->getName()));
            dump($form->getData());
            echo $form['recherche']->getData();
            die('');
            $menus = $this->getDoctrine()
            ->getRepository(Menu::class)
            ->recherche($request);
        }
        return $this->render('menu.html.twig',array('menus'=>$menus));
    }
}