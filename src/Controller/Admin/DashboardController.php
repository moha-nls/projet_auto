<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Entity\User;
use App\Entity\RendezVous;
use App\Entity\Service;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 * @Route("/admin", name="bo_")
 */
class DashboardController extends AbstractDashboardController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render("bundles/EasyAdminBundle/welcome.html.twig", [
                'titre_page'=>$titrePage = 'Back Office',
               "nb_users"=> $nbUsers = count($this->userRepository->findAll()),
            ]
        );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Auto');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Table de Bord', 'fa fa-home');
        yield MenuItem::section('Geres les Users');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);

        yield MenuItem::section('Gestion RDV');
        yield MenuItem::linkToCrud('Service', 'fas fa-sitemap', Service::class);
        yield MenuItem::linkToCrud('Rendez Vous', 'fas fa-list', RendezVous::class);


        yield MenuItem::section('Autres');
        yield MenuItem::linkToCrud('commentaires', 'fas fa-tag', Commentaire::class);
    }
//    public function configureUserMenu(UserInterface $user): UserMenu
//    {
//        return parent::configureUserMenu($user)
//            ->setName(($this->getUser()->getPrenom()). " " .($this->getUser()->getNom()) );
//    }

}
