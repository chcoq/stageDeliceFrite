<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 02/05/2018
 * Time: 09:20
 */

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends Controller
{
    public function menu(Request $request){
        $session = $request->getsession();
        if(!$session -> has('panier'))
            $menu= 0;
        else
            $menu= count($session->get('panier'));
        return $this->render('NavBar/panierMenu.html.twig',array('menu'=>$menu ));
    }

    /**
     * @Route("/ajouter/{id}",name="ajouter")
     */
    public function ajouter(Request $request ,$id)
    {
        $session = $request->getsession();
//$session->clear();  //permet d'affacer la session

        if(!$session->has('panier')) $session->set('panier',array());
        $panier= $session->get('panier');

       //$panier[ID DU PRODUIT] =>Quantité

        if(array_key_exists($id,$panier))
        {
            if ($request->query->get('qte') != null)$panier[$id]=$request->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifiée avec succés');

        }else{
            if($request->query->get('qte') !=null)
                $panier[$id]=$request->query->get('qte');
            else
            $panier[$id]=1;
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succés');
        }
        $session->set('panier',$panier);
        return $this->redirectToRoute('panier');
//ancienne version
//       return $this-> redirect($this->generateUrl('panier'));
    }

    /**
     * @Route("/supprimer/{id}",name="supprimer")
     */
    public function supprimer(Request $request,$id)
    {
        $session = $request->getsession();
        $panier = $session->get('panier');
        if(array_key_exists($id,$panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succés');
        }
        return $this->redirectToRoute('panier');
    }
    /**
     * @Route("/panier",name="panier")
     */
    public function panier(Request $request)
    {
        $session = $request->getsession();
        if(!$session->has('panier')) $session->set('panier',array());
//version < SF 4
//        $em =$this->getDoctrine()->getManager();
//        $menus = $em->getRepository('App:Menu')->findArray(array_keys($session->get('panier')));
////version > SF 3
        $menus =$this->getDoctrine()
            ->getRepository(Menu::class)
            ->findArray(array_keys($session->get('panier')));

//        if (!$menus) throw  $this->createNotFoundException('Le panier est vide.');




        return $this->render('panier.html.twig',array('menus'=>$menus ,
                                                            'panier' => $session->get('panier')));
    }

    public function livraison()
    {
        return $this->render('panier.html.twig');
    }

    public function validation()
    {
        return $this->render('panier.html.twig');
    }
//    public function index(SessionInterface $session)
//    {
//        $session->set('foo','bar');
//    }

}