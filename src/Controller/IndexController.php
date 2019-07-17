<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Performances;
use App\Entity\Gallerie;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        $performances = $em->getRepository(Performances::class)->findAll();
        $galleries = $em->getRepository(Gallerie::class)->findAll();

        dump($galleries);
        return $this->render('index/index.html.twig', [
            'performances' => $performances,
            'galleries' => $galleries,
        ]);
    }
}
