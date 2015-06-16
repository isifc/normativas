<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * OficinaType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class OficinaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('denominacionCorta')
            ->add('ofiCUE')
            ->add('ofiCUI')
            ->add('jurMarcBaj')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\BackendBundle\Entity\Oficina'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_backendbundle_oficina';
    }
}
