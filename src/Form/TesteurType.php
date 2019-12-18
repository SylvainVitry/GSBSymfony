<?php

namespace App\Form;

use App\Entity\Maladie;
use App\Entity\Testeur;
use App\Entity\TestClinique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TesteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('maladie', EntityType::class,[
                'label' => false,
                'class' => Maladie::class,
                'choice_label' => 'libelle' 
            ])
            ->add('testsClinique', EntityType::class,[
                'label' => false,
                'class' => TestClinique::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'nomClinique' 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testeur::class,
        ]);
    }
}
