<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemoignageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=> array('class'=>'span12')))
            ->add('texte','textarea',array('required'=>true,'attr'=> array('class'=>'span4')))
            ->add('isPublier','checkbox',array('required'=>FALSE,'attr'=> array('class'=>'span10 isSelect')))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Temoignage'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_temoignagetype';
    }
}
