<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
/**
 * DisposicionFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class DisposicionFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('gestion','filter_entity',array(
                                            'class' => 'HomeBackendBundle:Gestion',
                                            'placeholder' => 'filtar por gestión',
                                                    'attr'=> array('class'=>'form-control',
                                                   )))
            ->add('numero', 'filter_number',array(
                                            'attr'=> array('class'=>'form-control',
                                                    'placeholder' => 'Filtar por número')
                    ))
           //->add('fecha','filter_date_range')                        
                
           /*->add('fecha','filter_date',array(   
                                        'input'  => 'datetime',
                                        'widget' => 'single_text'
                                                                   
                    ))*/
            ->add(
                'fecha',
                'filter_date_range',
                array(
                    'left_date_options' => array(
                        'widget' => 'single_text',
                        'html5'   => false,
                        'attr'=> array('class'=>'form-control',
                                                    'placeholder' => 'Fecha Desde: ')
                     ), // date type options
                    'right_date_options' => array(
                        'widget' => 'single_text', 
                        'html5'   => false,
                        'attr'=> array('class'=>'form-control',
                                                    'placeholder' => 'Fecha Hasta: ')
                           
                    )
                )
            )
           
            ->add('oficina','filter_entity',array(
                                            'class' => 'HomeBackendBundle:Oficina', 
                                                    'attr'=> array('class'=>'form-control',
                                                    'placeholder' => 'Filtar por Oficina')))
                
            ->add('tema','filter_entity',array(
                        'class'  => 'HomeBackendBundle:Tema',
                        'attr'=> array('class'=>'form-control',
                                        'placeholder' => 'Filtar por Tema')
                        ))
                    
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ((array)$event->getForm()->getData() as $data) {
                if ( is_array($data)) {
                    foreach ($data as $subData) {
                        if (!empty($subData)) {
                            return;
                        }
                    }
                } else {
                    if (!empty($data)) {
                        return;
                    }    
                }
            }
            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_SUBMIT, $listener);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //$resolver->setDefaults(array(
            //'data_class' => 'Home\BackendBundle\Entity\Disposicion'
        //));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_disposicionfiltertype';
    }
}
