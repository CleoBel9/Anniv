<?php

namespace App\Controller;

use App\Entity\Anniv;
use App\Form\AnnivType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;

class AnnivController extends AbstractController
{
    #[Route('/index', name: 'app_anniv')]
    public function index(): Response
    {
        $anniversaires = $this->getDoctrine()->getRepository(Anniv::class)->findAll();

        return $this->render('anniv/index.html.twig', [
            'anniversaires' => $anniversaires,
        ]);
    }

    #[Route('/anniv/add', name: 'app_anniv_add')]
    public function add(Request $request): Response
    {
        $anniversaire = new Anniv();
        $form = $this->createForm(AnnivType::class, $anniversaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($anniversaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_anniv');
        }

        return $this->render('anniv/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/anniv/edit/{id}', name: 'app_anniv_edit')]
    public function edit(Request $request, Anniv $anniversaire): Response
    {
        $form = $this->createForm(AnnivType::class, $anniversaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_anniv');
        }

        return $this->render('anniv/edit.html.twig', [
            'anniversaire' => $anniversaire,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/anniv/delete/{id}', name: 'app_anniv_delete')]
    public function delete(Request $request, Anniv $anniversaire): Response
    {
        if ($this->isCsrfTokenValid('delete' . $anniversaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($anniversaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_anniv');
    }

    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('anniv/accueil.html.twig');
    }
}