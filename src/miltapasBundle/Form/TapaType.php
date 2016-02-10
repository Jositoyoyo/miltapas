<?php

namespace miltapasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TapaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('nombre');
	$builder->add('categoria', EntityType::class, array(
   		 'class' => 'miltapasBundle:Categoria',
    		 'choice_label' => 'nombre',
			));


    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'miltapasBundle\Entity\Tapa'
        ));
    }

    public function getName() {
        return 'Tapa';
    }

}
