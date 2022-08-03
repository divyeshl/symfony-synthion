<?php

namespace Nettivene\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class CakesController extends AbstractController
{
    function __construct(private RequestStack $requestStack) {}

    #[Route('/cakes', name: 'app_cakes')]
    public function index(): Response
    {
        $session = $this->requestStack->getSession();

        $numberOfVisits = $session->get('visits', 0);
        $session->set('visits', $numberOfVisits + 1);

        return $this->render('cakes/index.html.twig', [
            'visits' => $numberOfVisits,
        ]);
    }
}
