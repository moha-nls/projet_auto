<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPaginatorPageSize(5)
            ->setPageTitle(Crud::PAGE_INDEX, 'liste des Users')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un User');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            idField::new('id')
                ->onlyOnIndex(),
            TextField::new('prenom'),
            TextField::new('nom'),
            EmailField::new('email'),
            ArrayField::new('roles'),
        ];
    }
}
