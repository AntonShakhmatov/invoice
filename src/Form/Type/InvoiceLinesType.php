<?php

namespace App\Form\Type;

use App\Entity\InvoiceLines;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Type\InvoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class InvoiceLinesType extends AbstractType
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $connection = $this->entityManager->getConnection();
        $vetsinaZbozi = $connection->fetchAllAssociative("SELECT id, name FROM product WHERE type = 'Většina zboží a služeb'");
        $potraviny = $connection->fetchAllAssociative("SELECT id, name FROM product WHERE type = 'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů'");
        $kojeneckaVyziva = $connection->fetchAllAssociative("SELECT id, name FROM product WHERE type = 'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu'");
        $choices = [
            'Většina zboží a služeb' => [],
            'Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů' => [],
            'Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu' => [],
        ];

        // Format the fetched data for choices array
        foreach ($vetsinaZbozi as $row) {
            $choices['Většina zboží a služeb'][$row['name']] = $row['name'];
        }

        foreach ($potraviny as $row) {
            $choices['Potraviny, zdravotnické pomůcky, hromadná doprava, dětské sedačky do automobilů'][$row['name']] = $row['name'];
        }

        foreach ($kojeneckaVyziva as $row) {
            $choices['Kojenecká výživa, knihy a časopisy, pitná voda z vodovodu'][$row['name']] = $row['name'];
        }
        $builder
        ->add('invoice', InvoiceType::class)
        ->add('description', ChoiceType::class, [
            'choices' => $choices,
        ])
        ->add('quantity', IntegerType::class)
        ->add('amount', NumberType::class)
        ->add('vat_amount', ChoiceType::class, [
            'choices'  => [
                'základní sazba DPH 21%' => 21,
                'první snížená sazba DPH 15%' => 15,
                'druhá snížená sazba DPH 10%' => 10,
            ],
        ])
        ->add('total_with_vat', NumberType::class)
        ->add('save', SubmitType::class, [
            'label' => 'Save Invoice',
        ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLines::class,
        ]);
    }
}