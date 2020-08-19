<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Controller to render a basic api "homepage".
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/")
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function homepage(SerializerInterface $serializer)
    {
        return $this->render('api/homepage.html.twig', [
            'user' => $serializer->serialize($this->getUser(), 'jsonld')
        ]);
    }
}
