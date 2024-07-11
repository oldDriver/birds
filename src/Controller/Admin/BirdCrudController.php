<?php

namespace App\Controller\Admin;

use App\Entity\Bird;
use App\Entity\Make;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BirdCrudController extends AbstractCrudController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Bird::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $makeRepo = $this->entityManager->getRepository(Make::class);

        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('make'),
            AssociationField::new('model'),
            TextField::new('status')->hideOnForm(),
            AssociationField::new('status')->hideOnIndex(),
            TextField::new('serialNumber'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }
}
