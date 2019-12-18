<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\CategorieProduit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('categorieProduit', EntityType::class,[
                'required' => true,
                'label' => false,
                'class' => CategorieProduit::class,
                'choice_label' => 'libelle' 
            ])
            ->add('prix')
            ->add('remarques')
                           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
