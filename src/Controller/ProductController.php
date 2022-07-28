<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ManagerRegistry $Doctrine): Response
    {
        $entityManager = $Doctrine->getManager();
        $product = new Products();

        $product->setNAME('IPHONE 6');
        $product->setPRICE(1000);
        $product->setIMGPATH('img/product-1.jpg');
        $product->setDESCRIPTION('Ergonomic and stylish');

        $entityManager->persist($product);

        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());
    }

    /**
     *  #[Route('/product/{id}', name: 'product_show')]
     */

    public function show(ManagerRegistry $doctrine): Response
    {
        $product = $doctrine->getRepository(Products::class)->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('index.html.twig', [
            'products' => $product
        ]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }


    /**
     * #[Route('/product/edit/{id}', name: 'product_edit')]
     */
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Products::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute(
            'show_product',
            [
                'id' => $product->getId()
            ]
        );
    }
}
