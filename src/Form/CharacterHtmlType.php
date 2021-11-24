<?php

namespace App\Form;

use App\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterHtmlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'kind',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Type du Personnage'
                )
            )
            ->add(
                'name',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Nom du Personnage'
                )
            )
            ->add(
                'surname',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Surnom du Personnage'
                )
            )
            ->add(
                'caste',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Caste du Personnage'
                )
            )
            ->add(
                'knowledge',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Savoir du Personnage'
                )
            )
            ->add(
                'intelligence',
                IntegerType::class,
                array(
                    'required' => false,
                    'help' => 'Intelligence du Personnage'
                )
            )
            ->add(
                'life',
                IntegerType::class,
                array(
                    'required' => false,
                    'help' => 'Points de vie du Personnage'
                )
            )
            ->add(
                'image',
                TextType::class,
                array(
                    'required' => false,
                    'help' => 'Image du Personnage'
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
