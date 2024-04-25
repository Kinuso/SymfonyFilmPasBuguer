<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Classification;
use App\Entity\Films;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('urlAffiche')
            ->add(
                'lienTrailer'
                // , ['requiered' => false]
            )
            ->add('resume')
            ->add('duree', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text',
                'label' => "Durée :",
                'attr' => ['class' => "super"]
            ])
            ->add('dateSortie', null, [

                'widget' => 'single_text',
                'label' => "Date de sortie :"
            ])
            ->add('Classification', EntityType::class, [
                'class' => Classification::class,
                'choice_label' => 'intitule',
            ])
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
