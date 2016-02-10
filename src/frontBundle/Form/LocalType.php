<?php

namespace frontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LocalType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre');
        $builder->add('direccion');
        $builder->add('ciudad');
        $builder->add('coordenadas_x');
        $builder->add('coordenadas_y');
        $builder->add('telefono');
        $builder->add('web');
        $builder->add('categoria', EntityType::class, array(
            'class' => 'frontBundle:Categoria',
            'choice_label' => 'nombre',
        ));
        $builder->add('usuario', EntityType::class, array(
            'class' => 'frontBundle:Usuario',
            'choice_label' => 'nombre',
        ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'frontBundle\Entity\Local'
        ));
    }

}
