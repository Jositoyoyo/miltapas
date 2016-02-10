<?php

namespace frontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OpinionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descripcion');
		$builder->add('puntuacion');
		$builder->add('local', EntityType::class, array(
    'class' => 'frontBundle:Local',
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
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'frontBundle\Entity\Opinion'
        ));
    }
}
