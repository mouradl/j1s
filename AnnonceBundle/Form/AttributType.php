<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AttributType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=> array('class'=>'span12')))
            ->add('unite','text',array('required'=>FALSE,'attr'=> array('class'=>'span4')))
            ->add('libelle','text',array('required'=>FALSE,'attr'=> array('class'=>'span4')))
            ->add('isSelectbox','checkbox',array('required'=>FALSE,'attr'=> array('class'=>'span10 isSelect')))
            ->add('isRequired','checkbox',array('required'=>true,'attr'=> array('class'=>'span10')))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Attribut'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_attributtype';
    }
}
