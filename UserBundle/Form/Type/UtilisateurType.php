<?php

namespace Tuni\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UtilisateurType extends AbstractType
{
    
public $ROLE = array('ROLE_ADMIN' =>'ROLE_ADMIN','ROLE_USER' =>'ROLE_USER');
    
    public function buildForm(FormBuilder $builder, array $options)
    {
     
        $builder
            ->add('username')
            ->add('email', 'email')
            /*->add('roles' , 'choice', array('label' => 'Roles','choices' => $this->ROLE,
                   
                    'multiple' => true,
                    'expanded' => false,
                    'preferred_choices' => array('ROLE_ADMIN'),
                    'empty_value' => '- Choisissez un ROLE -',
                    'empty_data' => 'NULL','required' => true,
                        )
                )*/ 
            ->add('password', 'repeated', array('label' => 'Password','type' => 'password'));
    }


    public function getName()
    {
        return 'diagimm_crudbundle_Utilisateurtype';
    }
}
