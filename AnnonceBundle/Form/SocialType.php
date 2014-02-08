<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocialType extends AbstractType
{   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titre','text',array('attr'=> array('class'=>'span10')))
            ->add('url','text',array('attr'=> array('class'=>'span10')))
            ->add('icon','file',array('required'=>true,'attr'=> array('class'=>'form','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Social'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_Socialtype';
    }
}
