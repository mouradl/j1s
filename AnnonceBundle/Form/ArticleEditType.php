<?php

namespace Tuni\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleEditType extends AbstractType
{
    public $dir = array('left' => 'left', 'right' => 'right');
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titre', 'text', array('attr' => array('class' => 'span10')))
                ->add('contenu', 'textarea', array('attr' => array('class' => 'wysihtml5 span12','rows'=>'5')))
                ->add('direction', 'choice', array('required' => false,'attr' => array('class' => 'span11'), 'choices' => $this->dir,
                    'multiple' => false,
                    'expanded' => false,
                    'empty_value' => 'Sélectionner la direction',
                    'empty_data' => NULL
                        )
                )
                ->add('img', 'file', array('data_class' => null,'required'=>false,'attr'=> array('class'=>'span11','accept'=>'image/*','onchange'=>'checkfileImg(this);')))
                ->add('page', 'entity', array('attr' => array('class' => 'span5'),
                    'class' => 'TuniAnnonceBundle:Page',
                    'query_builder' => function($repository) {
                        return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC')->where("p.type=1");
                    },
                    'property' => 'nomPage',
                    'multiple' => FALSE,
                    'expanded' => FALSE,
                ))
;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tuni\AnnonceBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return 'tuni_adminbundle_ArticleProftype';
    }
}
