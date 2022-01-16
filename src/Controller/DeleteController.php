<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Nekretnina;

class DeleteController extends AbstractController
{
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteData(ManagerRegistry $doctrine, int $id): RedirectResponse
    {
        $entityManager = $doctrine->getManager();
        $nekretnina = $entityManager->getRepository(Nekretnina::class)->find($id);
        $entityManager->remove($nekretnina);
        $entityManager->flush();
        return $this->redirectToRoute('show');
    }
}
