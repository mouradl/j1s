<?php

namespace Tuni\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     
        $builder
            ->add('username','text',array('attr'=> array('class'=>'span10')))
            ->add('email', 'email',array('attr'=> array('class'=>'span10')))
             
            ->add('password', 'repeated', array('required'=>false,'attr'=> array('class'=>'span12'),
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password','attr'=> array('class'=>'span10',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'second_options' => array('label' => 'form.password_confirmation','attr'=> array('class'=>'span11',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ;
    }


     public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AdminBundle\Entity\Utilisateur'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_usertype';
    }
}
