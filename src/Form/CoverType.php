<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'votre nom',
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre prenom',
                'attr' => [
                    'placeholder' => 'votre prenom',
                ]
            ])
            ->add('diplome', TextareaType::class,[
                'label' => 'Votre diplome',
                'attr' => [
                    'placeholder' => 'votre diplome',
                ]
            ])
            ->add('entreprise', TextType::class,[
                'label' => 'Votre entreprise',
                'attr' => [
                    'placeholder' => 'votre entreprise',
                ]
            ])
            ->add('poste', TextType::class,[
                'label' => 'Votre poste',
                'attr' => [
                    'placeholder' => 'votre poste',
                ]
            ])
            ->add('annonce', TextType::class,[
                'label' => 'annonce',
                'attr' => [
                    'placeholder' => 'annonce',
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Générer une lettre de motivation',
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
