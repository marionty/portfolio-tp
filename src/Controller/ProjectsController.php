<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects', methods: ['GET'])]
    public function index(ProjectsRepository $projects): Response
    {
        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'projects' => $projects->findAll(),
            // dd($projects->findAll())
        ]);
    }
}
