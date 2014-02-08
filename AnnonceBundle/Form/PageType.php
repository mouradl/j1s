<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPage','text')
            ->add('motCles')
            ->add('descriptionPage')
            ->add('urlPage')
            ->add('type','checkbox',array('required'=>FALSE,'attr'=> array('class'=>'span10 isSelect')))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Page'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_pagetype';
    }
}
