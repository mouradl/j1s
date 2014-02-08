<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SliderType extends AbstractType
{   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titre','text',array('attr'=> array('class'=>'span10')))
            ->add('width','text',array('attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('height','text',array('attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('img','file',array('required'=>true,'attr'=> array('class'=>'form','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Slider'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_SliderProftype';
    }
}
