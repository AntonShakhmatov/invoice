<?php

namespace App\Entity;

use App\Entity\Invoice;
use App\Repository\InvoiceLinesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLinesRepository::class)]
class InvoiceLines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: "invoiceLines", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "invoice_id", referencedColumnName: "id")]
    private ?Invoice $invoice = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: '2')]
    private ?string $amount = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: '2')]
    private ?string $vat_amount = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: '2')]
    private ?string $total_with_vat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): static
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getInvoiceId(): ?int
    {
        return $this->invoice_id;
    }

    public function setInvoiceId(int $invoice_id): static
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVatAmount(): ?float
    {
        return $this->vat_amount;
    }

    public function setVatAmount(float $vat_amount): static
    {
        $this->vat_amount = $vat_amount;

        return $this;
    }

    public function getTotalWithVat(): ?float
    {
        return $this->total_with_vat;
    }

    public function setTotalWithVat(float $total_with_vat): static
    {
        $this->total_with_vat = $total_with_vat;

        return $this;
    }
}
