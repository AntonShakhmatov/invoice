<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    public function createProduct(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $form = $this->createForm(ProductType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $product = new Product();
            $product->setName($formData->getName());
            $entityManager->persist($product);

            $product->setType($formData->getType());
            $entityManager->persist($product);

            $product->setPrice($formData->getPrice());
            $entityManager->persist($product);

            $entityManager->flush();

            return $this->redirectToRoute('create_product');
        }

        return $this->render('product/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function getItems()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $items = $repository->findAll();

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'type' => $item->getType(),
                'price' => $item->getPrice()
            ];
        }

        return new JsonResponse($data);
    }
}
