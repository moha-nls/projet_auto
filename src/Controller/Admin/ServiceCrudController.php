<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPaginatorPageSize(10)
            ->setPageTitle(Crud::PAGE_INDEX, 'liste des Services')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un Service');
    }

    public function configureFields(string $pageName): iterable
    {
        $panelService = FormField::addPanel('INFOS SERVICES');
        $id = IdField::new('id')->onlyOnIndex();
        $nomService = TextField::new('nom_service');
        $prixService = MoneyField::new('prix_service')->setCurrency('EUR');
        $descriptionService = TextEditorField::new('description_service');
        $dureeService = NumberField::new('duree_service')->onlyOnForms();
        $createdAt = DateTimeField::new('createdAt', 'Date de Creation')->onlyOnIndex();
        $updatedAt = DateTimeField::new('updatedAt', 'Date de Modification')->onlyOnIndex();

       return [
            $panelService, $id, $nomService, $prixService, $descriptionService, $dureeService, $createdAt, $updatedAt
        ];
    }
}
