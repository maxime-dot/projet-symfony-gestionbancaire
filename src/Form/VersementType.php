<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Versement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VersementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('MontantVerse', MoneyType::class,[ 'attr' => [
                'class' => 'form-control',
                
            ],
            'label' => 'Montant à Verser' ,
            'label_attr' => [
                'class' => 'form-label mt-4'
            ]])
            ->add('dateVerse',DateType::class,[ 'attr' => [
                'class' => 'form-control',
                
            ],
            'label' => 'Date du Versement' ,
            'label_attr' => [
                'class' => 'form-label mt-4'
            ]])
            ->add('clients',EntityType::class,[ 
                'class' => Client::class ,
                'choice_label' => 'name' ,
                'attr' => ['class' => 'form-control',],
            'label' => 'Propriétaire du Compte' ,
            'label_attr' => [
                'class' => 'form-label mt-4'
            ]])
            ->add('submit', SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary mt-4',
                    
                ],
                'label' => 'Enregistrer' ,
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Versement::class,
        ]);
    }
}
