<?php

namespace frontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class TagType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        // $builder->add('categoria');
       /* $builder->add('categoria', EntityType::class, array(
            'class' => 'frontBundle:Categoria',
            'choice_label' => 'nombre',
        ));
        
        */
        $builder->add('local', CheckboxType::class, array(
            'label' => 'Show this entry publicly?',
            'required' => false,
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'frontBundle\Entity\Tag',
        ));
    }

}
