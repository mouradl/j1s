<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServiceExpressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('required'=>TRUE,'attr'=> array('class'=>'form-control placeholder','autofocus'=>"autofocus" ,'placeholder'=>"Nom")))
            ->add('prenom','text',array('required'=>TRUE,'attr'=> array('class'=>'form-control placeholder' ,'placeholder'=>"Prenom")))
            ->add('adresse','text',array('required'=>TRUE,'attr'=> array('class'=>'form-control placeholder' ,'placeholder'=>"Adresse")))
            ->add('tel','text',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"Tél","pattern"=>"^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$")))
            ->add('email','email',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"E-mail")))
            ->add('message','textarea',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','rows'=>"4",'placeholder'=>"Ecrire votre demande")))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\ServiceExpress'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_ServiceExpresstype';
    }
}
