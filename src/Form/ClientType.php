<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class ,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2' ,
                    'maxlength' => '255'
                ],
                'label' => 'Nom' ,
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                
            ])
            ->add('solde', MoneyType::class,[
                'attr' => [
                    'class' => 'form-control',
                    
                ],
                'label' => 'Solde' ,
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
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
            'data_class' => Client::class,
        ]);
    }
}
