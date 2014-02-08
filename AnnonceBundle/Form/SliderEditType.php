<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SliderEditType extends AbstractType
{   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titre','text',array('attr'=> array('class'=>'span10')))
            ->add('width','text',array('attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('height','text',array('attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('img','file',array('data_class' => null,'required'=>false,'attr'=> array('class'=>'span11','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
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
