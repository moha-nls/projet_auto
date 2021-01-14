<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PriseRdvController
 * @package App\Controller
 * @Route("/", name="app_")
 */
class PriseRdvController extends AbstractController
{
    private $entityManager;
    private $RendezVousRepository;

    public function __construct(RendezVousRepository $rendezVousRepository, EntityManagerInterface $entityManager)
    {
        $this->RendezVousRepository = $rendezVousRepository;
        $this->entityManager = $entityManager;
    }
     /**
     * @Route("/priseRdv", name="rdv")
     * @return Response
     * @param Request $request
     */
    public function index(Request $request)
    {
        $rdv = new RendezVous();
        $form = $this ->createForm(RendezVousType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $rdv = $form->getData();

            $this->entityManager->persist($rdv);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_rdv');
        }


        return $this->render('prise_rdv/priseRdv.html.twig', [
            'titre_section' => 'Demande de rendez-vous',
           'rendezvous' => $rendezvous = $this->RendezVousRepository->findAll(),
            'form'=> $form->createView()
        ]);
    }
}
