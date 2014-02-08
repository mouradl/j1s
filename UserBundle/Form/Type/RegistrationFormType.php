<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tuni\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
class RegistrationFormType extends BaseType
{
    
public $ROLE = array(
'ROLE_SUPER_ADMIN' =>'SUPER ADMIN',
'ROLE_ADMIN' =>'ADMIN',
//'ROLE_PROFESSIONNEL' =>'EMPLOYEUR',
//'ROLE_PARTICULIER' =>'JOBEUR',
//'ROLE_USER' =>'WEBMASTER',
);          
   

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     //parent::buildForm($builder, $options);
        $builder->add('roles' , 'choice', array('label' => 'Roles','attr'=> array('class'=>'span10'),'choices' => $this->ROLE,
                   
                    'multiple' => true,
                    'expanded' => true,
                    'preferred_choices' => array('ROLE_ADMIN'),
                    'empty_value' => '- Choisissez un ROLE -',
                    'empty_data' => 'NULL','required' => true,
                        )
                )
            ->add('username', null, array('label' => 'form.username','attr'=> array('class'=>'span10'), 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email','translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array('attr'=> array('class'=>'span10'),
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password','attr'=> array('class'=>'span10',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'second_options' => array('label' => 'form.password_confirmation','attr'=> array('class'=>'span10',"pattern"=>".{6,}", "title"=>"6 characters minimum")),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
           ;
    }


    public function getName()
    {
        return 'Tuni_user_registration';
    }
}
