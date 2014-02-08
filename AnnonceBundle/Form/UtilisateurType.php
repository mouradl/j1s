<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     
        $builder
            ->add('username','text',array('attr'=> array('class'=>'form-control','placeholder'=>'Login')))
            ->add('email', 'email',array('attr'=> array('class'=>'form-control','placeholder'=>'Adresse mail')))
             
            ->add('password', 'repeated', array('required'=>false,'attr'=> array('class'=>'form-control','placeholder'=>'Mot de passe'),
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password','attr'=> array('class'=>'form-control','placeholder'=>'Mot de passe',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'second_options' => array('label' => 'form.password_confirmation','attr'=> array('class'=>'form-control','placeholder'=>'Confirmer Mot de passe',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ;
    }


     public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Utilisateur'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_usertype';
    }
}
