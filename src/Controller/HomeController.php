<?php

namespace App\Controller;

use App\Entity\Nekretnina;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homePage(): Response
    {
        return $this->render('home/index.html.twig', [
            "createNew" => $this->generateUrl('create'),
            "showAll" => $this->generateUrl('show')
        ]);
    }







    /**
     * @Route("/product/edit/{id}", name="edit")
     */
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $nekretnina = $entityManager->getRepository(Nekretnina::class)->find($id);

        if (!$nekretnina) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $nekretnina->setNaslov('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $nekretnina->getId()
        ]);
    }
}
