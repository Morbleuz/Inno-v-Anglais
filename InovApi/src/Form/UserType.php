<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom',
                'label_attr' => ['class'=>'labels'], 
                'attr' => ['class' => 'form-control']
                ] )
            ->add('prenom',TextType::class, [
                'label' => 'Prénom',
                'label_attr' => ['class'=>'labels'], 
                'attr' => ['class' => 'form-control']
                ] )
            ->add('submit', SubmitType::class, [
                'label' => 'Sauvegarder le profil',
                'attr' => ['class' =>'btn btn-primary profile-button"']
                ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
