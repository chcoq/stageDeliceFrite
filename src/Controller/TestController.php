<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 26/04/2018
 * Time: 12:01
 */

namespace App\Controller;

//use App\Entity\Test;
use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends Controller
{

    /**
     * @Route("/test", name="test")
     */
    public function testFormulaire(Request $request)
    {


   $form= $this->createForm(TestType::class);


   if($request ->isMethod('POST') )
   {
    $form->submit($request->request->get($form->getName()));
        dump($form->getData());
        echo $form['Nom']->getData();

      $form = $this->createForm( TestType::class ,array
       ('Nom'=>'Lecocq',
        'Prenom'=>'David',
        'sexe'=> '1',
        'DateDe_Naissance'=> new \DateTime("1982-02-02"),
          'Pays'=>"FR",
          'Adresse'=>"14 rue des Glaïeuls",
         'CodePostal'=>"62000",


      ));
//       die();
   }


        return $this->render('/test.html.twig',array(
            'essai' => $form -> createView(),
        ));

    }



}