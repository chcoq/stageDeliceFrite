<?php
/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 03/05/2018
 * Time: 15:38
 */

namespace App\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListner
{
    public function __construct(ContainerInterface $container, SessionInterface $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.token_storage');
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $route = $event->getRequest()->attributes->get('_route');// recuper le nom de la route
        if ($route == 'livraison' || $route == 'validation') {//si la route est égale à livraison ou validation
            if ($this->session->has('panier')) { //on vérifie si on est connecter
                if (count($this->session->get('panier')) == 0) { //on vérifie si le n'est pas vide
                    $this->session->getFlashBag()->add('notification', 'Vous n\'avez pas d\'article dans le panier');
                    $event->setResponse(new RedirectResponse($this->router->generate('panier')));//si le panier est vide on redirige vers le panier
                }
            }
            if (!is_object($this->securityContext->getToken()->getUser())) {// si on est pas connecter on renvoie vers la page de connexion
                $this->session->getFlashBag()->add('notification', 'Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}