<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{   public $objet = array('Question sur la rémunération' => 'Question sur la rémunération',
    'Déclarer une annonce au contenu illicite'=>'Déclarer une annonce au contenu illicite',
    'Problèmes techniques' => 'Problèmes techniques', 
    'Question ou suggestion sur notre site' => 'Question ou suggestion sur notre site', 
   
    'Autres'=>'Autres');
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('required'=>TRUE,'required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"Nom et Prénom")))
            ->add('objet', 'choice', array('attr'=> array('class'=>'form-control'),'choices' => $this->objet,
                    'multiple' => false,
                    'expanded' => false,
                    'preferred_choices' => array('Question sur la réminiration'),
                    
                        )
                )
            ->add('email','email',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"Email")))
            ->add('message','textarea',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','rows'=>"4",'placeholder'=>"Message")))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Contact'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_contacttype';
    }
}
