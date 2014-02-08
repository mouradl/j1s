<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembreType extends AbstractType
{    public $civilite = array('M.' => 'Mr.', 'Mdm' => 'Mme', 'Mademoiselle' => 'Mlle');
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', 'choice', array('attr'=> array('class'=>'form-control'),'choices' => $this->civilite,
                    'multiple' => false,
                    'expanded' => false,
                    'preferred_choices' => array('Mr.'),
                    'empty_value' => 'Sélectionner votre civilté',
                    'empty_data' => 'NULL'
                        )
                )
            ->add('nom','text',array('attr'=> array('class'=>'form-control','placeholder'=>'Nom')))
            ->add('prenom','text',array('attr'=> array('class'=>'form-control','placeholder'=>'Prénom')))
//            ->add('entreprise')
//            ->add('siret')
//            ->add('age','text',array('attr'=> array('class'=>'input-mini','pattern'=>'[0-9]*', "title"=>"Chiffres")))
              ->add('tel','text',array('attr'=> array('class'=>'form-control','placeholder'=>'Telephone','pattern'=>'[\+][0-9]*', "title"=>"+33222222222")))
//            ->add('cachePhone','checkbox',array('required'=>false,'attr'=> array('class'=>'span12')))
//            ->add('fax','text',array('required'=>false,'attr'=> array('class'=>'span10','pattern'=>'[\+][0-9]*', "title"=>"+3322222222")))
             ->add('adresse','text',array('attr'=> array('class'=>'form-control','placeholder'=>'Adresse')))
             ->add('codePostal','text',array('required'=>false,'attr'=> array('class'=>'form-control','width'=>'50px','pattern'=>'[0-9]*', "title"=>"Chiffres",'placeholder'=>'Code postal')))
            
             ->add('logo','file',array('data_class' => null,'required'=>false,'attr'=> array('class'=>'avatar form-control','placeholder'=>"photos",'accept'=>'image/*','onchange'=>'checkfileImg(this);')))
//            ->add('parrain', 'email',array('attr'=> array('class'=>'span10')))
            
//            ->add('logo','text')
//            ->add('statutMembre', 'entity', array(
//               'class' => 'TuniAdminBundle:StatutMembre',
//                    'query_builder' => function($repository) {
//                        return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC');
//                    },
//                    'property' => 'statut',
//                     'multiple'  =>FALSE,
//                     'expanded' => FALSE,
//                    
//                ))
           
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Membre'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_membretype';
    }
}
