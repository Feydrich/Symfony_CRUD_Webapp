<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Nekretnina;
use App\Form\NekretninaFormType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UpdateController extends AbstractController
{
    /**
     * @Route("/update/{id}", name="update")
     */
    public function updateData(int $id, Request $request, ManagerRegistry $doctrine,  EntityManagerInterface $interface): Response
    {
        $query = $doctrine->getRepository(Nekretnina::class)->find($id);

        $nekretnina = new Nekretnina();
        $nekretnina->setNaslov($query->getNaslov());
        $nekretnina->setOpis($query->getOpis());
        $nekretnina->setCijena($query->getCijena());
        $nekretnina->setKategorija($query->getKategorija());

        $form = $this->createForm(NekretninaFormType::class, $nekretnina);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $doctrine->getManager();
            $databaseClone = $entityManager->getRepository(Nekretnina::class)->find($id);

            $databaseClone->setNaslov($nekretnina->getNaslov());
            $databaseClone->setOpis($nekretnina->getOpis());
            $databaseClone->setCijena($nekretnina->getCijena());
            $databaseClone->setKategorija($nekretnina->getKategorija());

            $entityManager->flush();
            return $this->redirectToRoute('show');
        }

        return $this->render('update/update.html.twig', [
            'controller_name' => 'UpdateController',
            'result' => $query,
            "nekretnina_form" => $form->createView(),
            "redirect" => $this->generateUrl('home')
        ]);
    }
}
