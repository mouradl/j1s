<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousCategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('attribut', 'entity', array(
               'class' => 'TuniAnnonceBundle:Attribut',
                    'query_builder' => function($repository) {
                        return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC');
                    },
                    'property' => 'nom',
                     'multiple'  =>TRUE,
                     'expanded' => FALSE,
                    
                ))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\SousCategorie'
        ));
    }

    public function getName()
    {
        return 'tuni_annoncebundle_souscategorietype';
    }
}
