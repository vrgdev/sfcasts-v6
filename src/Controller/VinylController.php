<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['artist' => 'Michael Jackson', 'song' => 'Smooth Criminal'],
            ['artist' => 'Britney Spears', 'song' => 'Toxic'],
            ['artist' => 'Johnny Cash', 'song' => 'Hurt'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if (!$slug) {
            $title = 'All';
        } else {
            $title = str_replace('-', ' ', $slug);
        }

        return new Response('browse: ' . ucwords($title));
    }
}
