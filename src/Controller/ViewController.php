<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    /**
     * @Route("/view", name="view")
     */
    public function index(): Response
    {

        $page = "Welcome Page from ViewController";
        $user = [
            'name' => 'Teddy',
            'age' => '39',
            'nickname' => 'Te39'
        ];
        $data = date('l jS \of F Y h:i:s A');
        $shopping_list = ['helmet','gloves','jacket'];

        return $this->render('view/index.html.twig', [
            'page' => $page,
            'user' => $user,
            'date' => $data,
            'shopping_list' => $shopping_list, 
        ]);
    }
}
