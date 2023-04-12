<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
       //redigier vers /patate92 au lieu de /admin
        ##[Route ('/patate92', name: 'admin', methods: ['GET', 'POST'])]
        #public function index (): Response
        #return $this-›render ('admin/index.html.twig');
    
    #[Route ('/admin')]
    public function redirectToHome () {
        return $this->redirectToRoute ('app_home');
    }    

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Espace d\'administration')
            ->setFaviconPath('/assets/favicon.ico');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Projects', 'fas fa-cubes', Projects::class);
        yield MenuItem::linkToCrud('Experiences', 'fas fa-cubes', Experience::class);
        yield MenuItem::linkToCrud('Education', 'fas fa-cubes', Education::class);

    }
}
