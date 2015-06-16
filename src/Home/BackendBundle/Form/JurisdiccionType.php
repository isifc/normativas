<?php

namespace Home\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * JurisdiccionType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class JurisdiccionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denominacion')
            ->add('denominacionCorta')
            ->add('CUIT')
        ;
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
        return 'home_backendbundle_jurisdiccion';
    }
}
