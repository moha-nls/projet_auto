<?php

namespace App\Controller;

use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PriseRdvController
 * @package App\Controller
 * @Route("/", name="app_")
 */
class PriseRdvController extends AbstractController
{
    private $RendezVousRepository;

    public function __construct(RendezVousRepository $rendezVousRepository)
    {
        $this->RendezVousRepository = $rendezVousRepository;
    }
     /**
     * @Route("/priseRdv", name="rdv")
     */
    public function index(): Response
    {

        $form = $this ->createForm(RendezVousType::class);

        return $this->render('prise_rdv/priseRdv.html.twig', [
            'titre_section' => 'Demande de rendez-vous',
           'rendezvous' => $rendezvous = $this->RendezVousRepository->findAll(),
            'form'=> $form->createView()
        ]);
    }
}
