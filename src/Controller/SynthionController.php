<?php

namespace Nettivene\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Psr\Log\LoggerInterface;

#[Route('/synthion', name: 'synthion_')]
class SynthionController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('synthion/index.html.twig', [
            'controller_name' => 'SynthionController',
        ]);
    }

    #[Route('/qs/{id}', name: 'qs' , requirements: ['id' => '\d{1,3}'])]
    public function queryString(Request $req, int $id = 123): Response
    {
        return $this->render('synthion/routeParameters.html.twig', [
            'path_parameter' => $id,
            'query_parameter' => $req->query->get('parameter'),
        ]);
    }

    #[Route('/redirect', name: 'redirect')]
    public function movieRedirection(): RedirectResponse
    {
        $movieList = ['Blade runner', 'Drive', 'Outrun', 'Alien', 'Die Hard'];
        return $this->redirectToRoute('synthion_redirect_movie_list', ['movies' => implode(',', $movieList)], 301);
    }

    #[Route(path: ['en' => '/redirectEnglish', 'fi' => '/redirectFinnish'], methods: ['GET', 'POST'], name: 'redirect_movie_list')]
    public function redirectMovie(Request $req): Response
    {
        return $this->render('synthion/movieList.html.twig', [
            'movieList' => explode(',', $req->query->get('movies'))
        ]);
    }

    #[Route('/autowiring/logger', methods: ['GET', 'POST'], name: 'autowire_logger')]
    public function autowireLogger(LoggerInterface $logger): Response
    {
        $logger->error('this is a log from the autowired log service');
        return $this->render('synthion/autowiringLogger.html.twig');
    }

    #[Route('/generateUrl', name: 'generate_url')]
    public function generateUrlForMovies(): Response
    {
        $movieList = ['Blade runner', 'Drive', 'Outrun', 'Alien', 'Die Hard'];
        $params = ['movies' => implode(',', $movieList)];
        $redirectPathName = 'synthion_redirect_movie_list';
        $movieUrl = $this->generateUrl($redirectPathName, $params, UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('synthion/generateUrl.html.twig', [
            'movieUrl' => $movieUrl
        ]);
    }
}
