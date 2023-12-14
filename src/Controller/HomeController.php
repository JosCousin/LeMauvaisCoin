<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;


class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(ManagerRegistry $doctrine): Response
    {

        $posts = $doctrine->getRepository(Post::class)->findAll();
        
        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            'controller_name' => 'HomeController',
            
        ]);
    }
}
