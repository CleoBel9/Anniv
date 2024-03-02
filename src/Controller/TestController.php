<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test_route')]
    public function testAction(): Response
    {
        // Test d'utilisation de getDoctrine()
        $repository = $this->getDoctrine()->getRepository(Test::class);
        $entities = $repository->findAll();

        // Remplacez YourEntity par le nom de l'entité que vous utilisez dans votre projet

        return $this->render('test/test.html.twig', [
            'entities' => $entities,
        ]);
    }
}
