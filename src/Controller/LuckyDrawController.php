<?php

namespace Nettivene\Controller;

use Nettivene\Form\Type\LuckyDrawFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/luckydraw', name: 'lucky_draw')]
class LuckyDrawController extends AbstractController
{
    #[Route('/', name: '_home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(LuckyDrawFormType::class);
        $form->handleRequest($request);

        $reqData = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $reqData = $form->getData();
            
        }

        return $this->render('lucky_draw/index.html.twig', [
            'form' => $form->createView(),
            'reqData' => $reqData,
        ]);
    }
}
