<?php

namespace App\Controller\Admin;

use App\Entity\Battery;
use App\Entity\BatteryType;
use App\Entity\Bird;
use App\Entity\Make;
use App\Entity\Military;
use App\Entity\Model;
use App\Entity\Position;
use App\Entity\Rank;
use App\Entity\Status;
use App\Entity\Team;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

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
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Zoo');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield MenuItem::section('Persons');
        yield MenuItem::linkToCrud('Teams', 'fa fa-group', Team::class);
        yield MenuItem::linkToCrud('Militaries', 'fa fa-user', Military::class);
        yield MenuItem::linkToCrud('Positions', 'fa fa-file', Position::class);
        yield MenuItem::linkToCrud('Ranks', 'fa fa-file', Rank::class);
        yield MenuItem::section('Birds');
        yield MenuItem::linkToCrud('Birds', 'fa fa-file', Bird::class);
        yield MenuItem::linkToCrud('Batteries', 'fa fa-file', Battery::class);
        yield MenuItem::section('Properties');

        yield MenuItem::linkToCrud('Make', 'fa fa-pencil', Make::class);
        yield MenuItem::linkToCrud('Models', 'fa fa-pencil', Model::class);
        yield MenuItem::linkToCrud('Battery Types', 'fa fa-pencil', BatteryType::class);
        yield MenuItem::linkToCrud('Status', 'fa fa-pencil', Status::class);
        yield MenuItem::section('Action');
        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
