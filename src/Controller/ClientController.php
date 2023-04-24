<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'list_client')]
    public function index(ClientRepository $repository): Response
    {   
        $clt = $repository->findAll() ;
        
        return $this->render('client/index.html.twig', [
            "clients" => $clt ,
        ]);
    }


    #[Route('/client/new', name: 'new_client', methods : ['GET', 'POST'])]
     public function newClient(Request $request, EntityManagerInterface $manager ) : Response
    {       
        $client = new Client() ;
        $form = $this->createForm(ClientType::class, $client) ;

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ){
            $client = $form->getData();
            $manager->persist($client);
            $manager->flush();

            $this->addFlash(
                "success",
                "New Customer is saved"
            );

            return $this->redirectToRoute("list_client") ;

        }

        return $this->render('client/form.html.twig',[
            "form" => $form->createView() ,
        ]);
    }

    #[Route('/client/edit/{id}', name:"edit_client", methods : ['GET', 'POST'])]
    public function editClient(Client $clt, Request $request, EntityManagerInterface $manager): Response
    {   
        $form = $this->createForm(ClientType::class, $clt) ;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ){
            $client = $form->getData();
            $manager->persist($client);
            $manager->flush();

            $this->addFlash(
                "success",
                "A Customer is modified"
            );

            return $this->redirectToRoute("list_client") ;

        }

        return $this->render("client/edit.html.twig",[
            "form" => $form->createView(),
        ]);

    }

    #[Route('/client/delete/{id}', name: "delete_client")]
    public function deleteClient(EntityManagerInterface $manager , Client $clt): Response
    {
            $manager->remove($clt);
            $manager->flush();

            $this->addFlash(
                "danger",
                "A Customer has been deleted"
            );

            return $this->redirectToRoute("list_client");
    }
}
