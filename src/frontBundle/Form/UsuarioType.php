<?php

namespace frontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array(
            		'required' => true,
                        'label' => 'Nombre usuario',)
            	  );
       $builder->add('email', EmailType::class, array(
            		'required' => true,
            		'label' => 'Your Email',
            		'invalid_message' => 'You entered an invalid value',)
            		);
        $builder->add('password', PasswordType::class,array(
                        'required' => true,
            		'label' => 'Tu contraseña',
            		'invalid_message' => 'Invalid value',)
        );
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'frontBundle\Entity\Usuario'
        ));
    }
}
