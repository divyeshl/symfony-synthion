<?php

namespace Nettivene\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Nettivene\Service\Cyberpunk\DtoInterface;
use Nettivene\Service\Cyberpunk\Service;

#[Route('/cyberpunk', name: 'cyberpunk_')]
class CyberpunkController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('cyberpunk/index.html.twig', []);
    }

    #[Route('/movies', name: 'injection')]
    public function getMovies(Service $services, DtoInterface $dto): Response
    {
        $movies = $services->getMovies();
        $movies = $dto->formatMovieResponse($movies);
        return $this->render('cyberpunk/movieList.html.twig', ['movies' => $movies]);
    }
}
