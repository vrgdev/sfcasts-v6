<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('homepage');
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
