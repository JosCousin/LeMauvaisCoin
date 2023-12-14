<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    #[IsGranted("ROLE_USER")]
    
    public function home(ManagerRegistry $doctrine): Response
    {

        $posts = $doctrine->getRepository(Post::class)->findAll();
        
        return $this->render('home/index.html.twig', [
            'posts' => $posts,

        ]);
    }
}
