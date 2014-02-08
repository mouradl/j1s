<?php

namespace Tuni\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembreType extends AbstractType
{    public $civilite = array('M.' => 'M.', 'Mdm' => 'Mdm', 'Mademoiselle' => 'Mademoiselle');
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', 'choice', array('attr'=> array('class'=>'span11'),'choices' => $this->civilite,
                    'multiple' => false,
                    'expanded' => true,
                    'preferred_choices' => array('M.'),
                    'empty_value' => '- Choisissez un type -',
                    'empty_data' => 'NULL'
                        )
                )
            ->add('nom','text',array('attr'=> array('class'=>'span10')))
            ->add('prenom','text',array('attr'=> array('class'=>'span10')))
            ->add('age','text',array('required'=>false,'attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('tel','text',array('required'=>true,'attr'=> array('class'=>'span10','pattern'=>'[0-9]*', "title"=>"9 chiffres")))
            ->add('cachePhone','checkbox',array('required'=>false,'attr'=> array('class'=>'span12')))
            ->add('fax','text',array('required'=>false,'attr'=> array('class'=>'span10','pattern'=>'[0-9]*', "title"=>"9 chiffres")))
            ->add('adresse','text',array('attr'=> array('class'=>'span10')))
            ->add('codePostal','text',array('required'=>false,'attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
            ->add('logo','file',array('data_class' => null,'required'=>false,'attr'=> array('class'=>'span11','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
            ->add('parrain', 'email',array('required'=>false,'attr'=> array('class'=>'span10')))
            ->add('isNotFake','checkbox',array('required'=>false,'attr'=> array('class'=>'span12')))        
        ;  
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AdminBundle\Entity\Membre'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_membretype';
    }
}
