<?php

namespace App\Controller;


use App\Entity\Pays;
use App\Form\PaysType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private  $em ;
    public function __construct(EntityManagerInterface $entityManager){
        $this ->em = $entityManager;
    }
    
    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {

        /**
         * Creation du formulaire
         * Initialisation pour la création d'un nouveau pays
         * Création de l'aperçu du formulaire
         * Injection de la Request
         * Ajouter la request pour prendre en compte la methode utiliser par le formulaire (post, get )
         * Condition pour valider le formulaire
         * Récupérer les champs du formulaire
         * Utiliser la fonction entity Manager de Doctrine pour Persister et enrégistrer les champs en bd
         * Rendre la vue du formulaire au template
         */


        $pays = new Pays();
        $form = $this->createForm(PaysType::class, $pays);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $paysForm = $form ->getData();
            $codePays = $paysForm->getCodePays();
            $nhabi = $paysForm->getNbHabitant();
            $pays ->setCodePays($codePays);
            $pays ->setNbHabitant($nhabi);

            $this->em->persist($pays);
            $this->em->flush();

            $this->addFlash("success" , "Pays crée avec succès");
        }


        $tableau[] = array("nom" => "Togbe" , "prenom"=> "Rodrigue" , "age" => 15  );

        return $this->render('home/index.html.twig', [
            'tableau' => $tableau,
            'form' => $form->createView(),
        ]);
    }
}
