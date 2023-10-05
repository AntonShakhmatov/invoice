<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Invoice;
use App\Entity\InvoiceLines;
use App\Form\Type\InvoiceType;
use App\Form\Type\InvoiceLinesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InvoiceController extends AbstractController
{
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $invoice = new InvoiceLines();

        $form = $this->createForm(InvoiceLinesType::class, $invoice);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();
            return $this->redirectToRoute('app_invoice');
        }

        return $this->render('invoice/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function getItems()
    {
        $repository = $this->getDoctrine()->getRepository(InvoiceLines::class);
        $items = $repository->findAll();

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->getId(),
                'description' => $item->getDescription(),
                'quantity' => $item->getQuantity(),
                'amount' => $item->getAmount(),
                'vat_amount' => $item->getVatAmount(),
                'total_with_vat' => $item->getTotalWithVat(),
            ];
        }

        return new JsonResponse($data);
    }
}
