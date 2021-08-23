<?php

namespace App\Controller;

use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}", name="article")
     */
    public function index(int $id): Response
    {
        $showArticle = $this->getDoctrine()
                    ->getRepository(Articles::class)
                    ->findOneBy(['id' => 1]);

        return $this->render('article/index.html.twig', [
            'article' => $showArticle,
        ]);
    }
    /**
     * @Route("/new", name="new_article")
     */
    public function create():Response
    {
        //fetch entityManager
        $entityManager = $this->getDoctrine()->getManager();
        //instantiate App/Entity/Article
        $article = new Articles();
        $article->setTitle('Article One');
        //prepare statement 
        $entityManager->persist($article);
        //execute query
        $entityManager->flush();

        return new Response('Saved new article in DB with ID as' . $article->getId());

    }
}
