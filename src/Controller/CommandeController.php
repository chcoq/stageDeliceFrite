<?php
/**
 * // * Created by PhpStorm.
 * // * User: lecocq
 * // * Date: 02/05/2018
 * // * Time: 09:20
 * // */

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\Menu;
use App\Entity\UtilisateursAdresses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends Controller
{
    public function prepareCommande(Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
//mise en session (commande)
        if (!$session->has('commande'))//si la session commande n'existe pas
        {
            $commande = new  Commandes();//on instancie l'entité commande
        } else {
            $commande = $em->getRepository('App:Commandes')->find($session->get('commande'));//sinon on  utilise c'elle stocké
        }
        $commande->setValider(0);
        $commande->setUser($this->container->get('security.token_storage')->getToken()->getUser());//savoir quel utilisateur a créer la commnande
        $commande->setDate(new \DateTime());//on créer une nouvelle date
        $commande->setReference(0);//on va créer un service qui va chercher la ref de la comnande  pour que dans la comptabilité toutes les commandes puissent se suivre sans qu'il y est de trous
        $commande->setCommande($this->facture($request));

        if (!$session->has('commande'))//si la session commande n'eiste pas on va la  persiter et  la stocker en session
        {
            $em->persist($commande);
            $session->set('commande', $commande);
        }
        $em->flush();//si elle existe on ecrase les docnnées
        return new Response($commande->getId());
    }

    public function facture(Request $request)
    {

        $em = $this->getDoctrine();
        $session = $this->get('request_stack')->getCurrentRequest()->getSession();

        $generator = random_bytes(128);//genere une chaine aléatoire de 128 octets.
        $adresse = $session->get('adresse');
        $panier = $session->get('panier');
        $commande = array();
        $totalHT = 0;
        $totalTVA = 0;

        $facturation = $em->getRepository(UtilisateursAdresses::class)->find($adresse['facturation']);//recupere les données de facturation dans adresse grace à la session
        $livraison = $em->getRepository(UtilisateursAdresses::class)->find($adresse['livraison']);
        $menus = $em->getRepository(Menu::class)->findArray(array_keys($session->get('panier')));

        foreach ($menus as $menu) {
            $prixHT = round($menu->getPrice() * $panier[$menu->getId()],2);
            $prixTTC = $menu->getPrice() * $panier[$menu->getId()] * $menu->getTva()->getMultiplicate();
            $totalHT += $prixHT;
//création d'une cellule (tableau tva)
            if (!isset($commande['tva'][$menu->getTva()->getValeur() . ' %']))
                $commande['tva'][$menu->getTva()->getValeur() . ' %'] = round($prixTTC - $prixHT, 2);//stock le montant de la tva

        else
                $commande['tva'][$menu->getTva()->getValeur() . ' %'] += round($prixTTC - $prixHT, 2);// si un montant a déja une tva on additionne le montant

            $totalTVA += round($prixTTC-$prixHT,2);

        //création d'une cellule menu
            $commande['menu'][$menu->getId()] = array('reference' => $menu->getName(),
                'quantite' => $panier[$menu->getId()],
                'prixHT' => round($menu->getPrice(), 2),
                'prixTTC' => round($menu->getPrice() * $menu->getTva()->getMultiplicate(), 2));
        }
        $commande['livraison'] = array('nom' => $livraison->getNom(),
            'prenom' => $livraison->getPrenom(),
            'telephone' => $livraison->getTelephone(),
            'adresse' => $livraison->getAdresse(),
            'cp' => $livraison->getCp(),
            'ville' => $livraison->getVille(),
            'pays' => $livraison->getPays(),
            'complement' => $livraison->getComplement());

        $commande['facturation'] = array('nom' => $facturation->getNom(),
            'prenom' => $facturation->getPrenom(),
            'telephone' => $facturation->getTelephone(),
            'adresse' => $facturation->getAdresse(),
            'cp' => $facturation->getCp(),
            'ville' => $facturation->getVille(),
            'pays' => $facturation->getPays(),
            'complement' => $facturation->getComplement());

        $commande['prixHT'] = round($totalHT, 2);
        $commande['prixTTC'] = round($totalTVA +$totalHT, 2);
        $commande['token'] = bin2hex($generator);

        return $commande;
    }

    /**
     * @Route("/api/banque/{id}",name="validationCommande")
     */

    public function validationCommande(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $commande = $em->getRepository('App:Commandes')->find($id);

        if(!$commande || $commande->getValider()==1) //on vérifie que la commande existe et qu'elle n'a pas encore été valider
            throw $this->createNotFoundException('La commande n\'existe pas');

        $commande->setValider(1);//si pas encore valider on passe la valeur à 1
//        dump($commande );
//        die('debug');
        $commande->setReference($this->get('setNewReference')->reference());//on renvoi vers le service qui va referencer
        $em->flush();
        $session = $request->getSession();
        $session->remove('adresse');//on supprime tous dans la session sauf l'utilisateur
        $session->remove('panier');
        $session->remove('commande');

        $this->get('session')->getFlashBag()->add('success','Votre commande est validée avec succés');
        return $this->redirect($this->generateUrl('facture'));
    }

}

