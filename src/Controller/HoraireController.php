<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Form\HoraireType;
use App\Repository\HoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/horaire")
 */
class HoraireController extends Controller
{
    /**
     * @Route("/", name="horaire_index", methods="GET")
     */
    public function index(HoraireRepository $horaireRepository): Response
    {
        return $this->render('horaire/index.html.twig', ['horaires' => $horaireRepository->findAll()]);
    }

    /**
     * @Route("/new", name="horaire_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $horaire = new Horaire();
        $form = $this->createForm(HoraireType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaire);
            $em->flush();

            return $this->redirectToRoute('horaire_index');
        }

        return $this->render('horaire/new.html.twig', [
            'horaire' => $horaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="horaire_show", methods="GET")
     */
    public function show(Horaire $horaire): Response
    {
        return $this->render('horaire/show.html.twig', ['horaire' => $horaire]);
    }

    /**
     * @Route("/{id}/edit", name="horaire_edit", methods="GET|POST")
     */
    public function edit(Request $request, Horaire $horaire): Response
    {
        $form = $this->createForm(HoraireType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('horaire_edit', ['id' => $horaire->getId()]);
        }

        return $this->render('horaire/edit.html.twig', [
            'horaire' => $horaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="horaire_delete", methods="DELETE")
     */
    public function delete(Request $request, Horaire $horaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$horaire->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($horaire);
            $em->flush();
        }

        return $this->redirectToRoute('horaire_index');
    }
}
