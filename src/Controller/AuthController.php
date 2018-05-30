<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 30/05/2018
 * Time: 09:12
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthController extends Controller
{

    public function AuthAction()
    {
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository('App:Config')->find(1);
//        dump($config);
//        die();

        return $this-> render('NavBar/Auth.html.twig',['config'=>$config]);
    }


}