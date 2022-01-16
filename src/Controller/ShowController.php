<?php

namespace App\Controller;

use App\Entity\Nekretnina;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

class ShowController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function show(ManagerRegistry $doctrine): Response
    {
        $nekretnine = $doctrine->getRepository(Nekretnina::class)->findAll();

        return $this->render("show/show.html.twig", [
            "queries" => $nekretnine,
            "redirect" => $this->generateUrl('home')
        ]);
    }
}
