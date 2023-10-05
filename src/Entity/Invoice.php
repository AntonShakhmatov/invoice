<?php

namespace App\Entity;

use App\Entity\InvoiceLines;
use Doctrine\DBAL\Types\Types;
use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $invoice_date = null;

    #[ORM\Column]
    private ?int $invoice_number = null;

    #[ORM\Column]
    private ?int $customer_id = null;


    #[ORM\OneToMany(targetEntity:InvoiceLines::class, mappedBy:"invoice", cascade: ["persist"])]

    private Collection $invoiceLines;

    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoice_date;
    }

    public function setInvoiceDate(\DateTimeInterface $invoice_date): static
    {
        $this->invoice_date = $invoice_date;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoice_number;
    }

    public function setInvoiceNumber(int $invoice_number): static
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(int $customer_id): static
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getInvoiceLines(): Collection
    {
        return $this->invoiceLines;
    }

    public function addInvoiceLine(InvoiceLines $invoiceLine): void
    {
        $this->invoiceLines[] = $invoiceLine;
        $invoiceLine->setInvoice($this);
    }

    public function removeInvoiceLine(InvoiceLines $invoiceLine): void
    {
        $this->invoiceLines->removeElement($invoiceLine);
        $invoiceLine->setInvoice(null);
    }
}