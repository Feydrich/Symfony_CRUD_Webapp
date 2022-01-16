<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Nekretnina;
use App\Form\NekretninaFormType;
use Doctrine\ORM\EntityManagerInterface;

class InsertController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     */
    public function insertData(Request $request, EntityManagerInterface $interface): Response
    {
        $nekretnina = new Nekretnina();
        $form = $this->createForm(NekretninaFormType::class, $nekretnina);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $interface->persist($nekretnina);
            $interface->flush();
            return $this->redirectToRoute('show');
        }

        return $this->render("insert/insert.html.twig", [
            "nekretnina_form" => $form->createView(), "redirect" => $this->generateUrl('home')
        ]);
    }
}
