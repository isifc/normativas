<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DisposicionType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class DisposicionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gestion','entity',array(
                                    'class' => 'HomeBackendBundle:Gestion',
                                    'placeholder' => 'Seleccione Gestión',
                                    'attr' => array('class' => 'form-control')))
            ->add('tema','entity',array(
                                    'class' => 'HomeBackendBundle:Tema',
                                    'placeholder' => 'Seleccione Tema',
                                    'attr' => array('class' => 'form-control')))
            ->add('oficina')
            ->add('numero')
            ->add('fecha','date',array('widget' => 'single_text',
                        'html5'   => false))
            ->add('descripcion','textarea')
            ->add('estado','checkbox',array(
                                    'attr' => array('type' => 'checkbox',
                                                    'required'=> 'false')))
            ->add('file',new FileType(), array(
                                    'attr' => array('class' => 'well')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Disposicion',
            //'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_disposicion';
    }
}
