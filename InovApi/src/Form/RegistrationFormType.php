<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => ['class'=> 'form-control', 'placeholder' => 'Votre login'],
                'label_attr' => ['class'=> 'fw-bold'],
            //    'attr' => ['placeholder' => 'hereYourPlaceHolder']
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class'=> 'form-control', 'placeholder' => 'Nom de l\'utilisateur'],
                'label_attr' => ['class'=> 'fw-bold'],
            //    'attr' => ['placeholder' => 'hereYourPlaceHolder']
            ])->add('prenom', TextType::class, [
                'attr' => ['class'=> 'form-control', 'placeholder' => 'Prenom de l\'utilisateur'],
                'label_attr' => ['class'=> 'fw-bold'],
            //    'attr' => ['placeholder' => 'hereYourPlaceHolder']
            ])
    
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez acceptez les règles d\'utilisation',
                    ]),
                ],
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrez un mots de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit se composer d\'au moins {{ limit }} character',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'attr' => ['class'=> 'form-control', 'placeholder' => 'Mot de passe'], 
                'label_attr' => ['class'=> 'fw-bold'],                       
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
