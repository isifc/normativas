<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DisposicionType form.
 * @author Aguirre Facundo <isifc.facu@gmail.com>
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
            ->add(
                'gestion','entity',
                array(
                    'class' => 'HomeBackendBundle:Gestion',
                    'placeholder' => 'Seleccione Gestión',
                    'attr' => array('class' => 'form-control'),
                )
            )
            ->add(
                'tema','entity',
                array(
                    'label' => 'Tematica',
                    'class' => 'HomeBackendBundle:Tema',
                    'placeholder' => 'Seleccione Tema',
                    'attr' => array('class' => 'form-control'),
                )
            )
            ->add('oficina')
            ->add(
                'numero', null,
                array('label' => 'Número')
            )
                
            ->add(
                'fecha','date',
                array(
                    'label'  => 'Fecha',
                    'widget' => 'single_text',
                    'html5'  => false,
                )
            )
            ->add(
                'descripcion','textarea',
                array('label' => 'Descripcion',
                      'attr' => array('style' => 'width:250%;height:4em'),
                      )
            )
            ->add(
                'estado','checkbox',
                array(
                    'label' => '¿Desea hacer pública esta disposición?',
                    'attr' => array(
                        'type' => 'checkbox',
                        'required'=> 'false',
                    ),
                )
            )
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
            'data_class' => 'Home\BackendBundle\Entity\Disposicion'
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
