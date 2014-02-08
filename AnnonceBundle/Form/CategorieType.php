<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tuni\AnnonceBundle\Form\SousCategorieType;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCat')
            ->add('isPublished')
            ->add('descCat','textarea')
            ->add('motCles')
            ->add('icon', 'file', array('data_class' => null,'required' => false, 'attr' => array('class' => 'form','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
//                ->add('SousCategories', 'collection', array(
//                    'type' => new SousCategorieType(),
//                    'allow_add' => true,
//                    'allow_delete' => true,
//                    'prototype' => true,
//                    'by_reference' => false,
//                    ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Categorie'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_categorietype';
    }
}
