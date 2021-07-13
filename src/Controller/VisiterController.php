<?php

namespace App\Controller;

use App\Entity\Visiter;
use App\Form\VisiterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisiterController extends AbstractController
{

    private  $em ;
    public function __construct(EntityManagerInterface $entityManager){
        $this ->em = $entityManager;
    }

    #[Route('/visiter', name: 'visiter')]
    public function index(): Response
    {
        return $this->render('visiter/index.html.twig');
    }

    #[Route('/visiter/add', name: 'visiter_add')]
    public function add(Request $request): Response
    {


        $visite = new Visiter();
        $form = $this->createForm(VisiterType::class, $visite);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $visite = $form ->getData();

            $this->em->persist($visite);
            $this->em->flush();

            $this->addFlash("success" , "Visiteur crée avec succès");
        }

        return $this->render('visiter/add.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
