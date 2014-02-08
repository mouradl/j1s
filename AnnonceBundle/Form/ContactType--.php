<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{   public $objet = array('Problèmes techniques' => 'Problèmes techniques', 'Réclamations' => 'Réclamations', 'Régie publicitaire' => 'Régie publicitaire','Partenariat'=>'Partenariat','Autres'=>'Autres');
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('required'=>TRUE,'required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"Nom")))
            ->add('objet', 'choice', array('attr'=> array('class'=>'form-control'),'choices' => $this->objet,
                    'multiple' => false,
                    'expanded' => false,
                    'preferred_choices' => array('Réclamations'),
                    
                        )
                )
            ->add('email','email',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','placeholder'=>"Email")))
            ->add('message','textarea',array('required'=>TRUE,'attr'=> array('class'=>'form-control ','rows'=>"4",'placeholder'=>"Sujet de message")))
            
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
