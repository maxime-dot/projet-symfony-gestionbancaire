<?php

namespace App\Controller;


use App\Entity\Client;
use App\Entity\Versement;
use App\Form\VersementType;
use App\Repository\VersementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VersementController extends AbstractController
{
    #[Route('/versement', name: 'list_vers')]
    public function index(VersementRepository $repository): Response
    {
        $vers = $repository->findAll() ;
        
        return $this->render('versement/index.html.twig', [
            "versmnts" => $vers ,
        ]);
    }

    #[Route('/versement/new', name: 'new_versement', methods : ['GET', 'POST'])]
    public function newVersement(Request $request, EntityManagerInterface $manager ) : Response
   {       
       $client = new Client() ;
       $verse = new Versement() ;
       $form = $this->createForm(VersementType::class, $verse) ;

       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid() ){
           
           $manager->persist($verse);
           $manager->flush();

           $this->addFlash(
               "success",
               "New Versement is saved"
           );

           return $this->redirectToRoute("list_vers") ;

       }

       return $this->render('versement/form.html.twig',[
           "form" => $form->createView() 
       ]);
   }
}
