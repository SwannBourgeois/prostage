<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;


class MetierController extends AbstractController
{
    /**
     * @Route("/", name="metier_accueil")
     */
    public function index(): Response
    {
        //Récupérer le répository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('metier/index.html.twig', ['stages'=>$stages]);
    }

    /**
     * @Route("/entreprises", name="metier_entreprises")
     */
    public function entreprises(): Response
    {
        //Récupérer le répository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises enregistrées en BD
        $entreprises = $repositoryEntreprise->findAll();

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('metier/entreprises.html.twig', ['entreprises'=>$entreprises]);
    }

    /**
     * @Route("/entreprises_stage/{id}", name="metier_entreprises_stage")
     */
    public function entreprises_stage($id): Response
    {
        //Récupérer le répository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises enregistrées en BD
        $entreprisesStage = $repositoryEntreprise->find($id);

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('metier/entreprises_stage.html.twig', ['entreprisesStage'=>$entreprisesStage]);
    }

    /**
     * @Route("/formations", name="metier_formations")
     */
    public function formations(): Response
    {
        //Récupérer le répository de l'entité Entreprise
        $repositoryFormations = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les entreprises enregistrées en BD
        $formations = $repositoryFormations->findAll();

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('metier/formations.html.twig', ['formations' => $formations]);
    }

    /**
     * @Route("/formations_stage/{id}", name="metier_formations_stage")
     */
    public function formations_stage($id): Response
    {
        //Récupérer le répository de l'entité Entreprise
        $repositoryFormations = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les entreprises enregistrées en BD
        $formationsStage = $repositoryFormations->find($id);

        //Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('metier/formations_stage.html.twig', ['formationsStage'=>$formationsStage]);
    }

    /**
     * @Route("/stages/{id}", name="metier_stages")
     */
    public function stages($id): Response
    {
        //Récupérer le répository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages enregistrés en BD
        $stage = $repositoryStage->find($id);

        return $this->render('metier/stages.html.twig', ['stage'=>$stage]);
    }
}
