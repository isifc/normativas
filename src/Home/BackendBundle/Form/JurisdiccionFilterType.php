<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

/**
 * JurisdiccionFilterType filtro.
 * @author Nombre Apellido <name@gmail.com>
 */
class JurisdiccionFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denominacion', 'filter_text',array(
                        'attr'=> array('class'=>'form-control')
                    ))
            ->add('denominacionCorta', 'filter_text',array(
                        'attr'=> array('class'=>'form-control')
                    ))
            ->add('CUIT', 'filter_number_range',array(
                        'attr'=> array('class'=>'form-control')
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
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Jurisdiccion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_jurisdiccionfiltertype';
    }
}
