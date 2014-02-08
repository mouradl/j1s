<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeviseType extends AbstractType
{   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('code','text',array('attr'=> array('class'=>'span10')))
            ->add('nom','text',array('attr'=> array('class'=>'span10')))
            ->add('tauxChangeUsd','text',array('attr'=> array('class'=>'span5','pattern'=>'[0-9.]*', "title"=>"Chiffres")))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Devise'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_Devisetype';
    }
}
