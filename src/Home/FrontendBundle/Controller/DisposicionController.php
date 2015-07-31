<?php

namespace Home\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\BackendBundle\Entity\Disposicion;
use Home\BackendBundle\Form\DisposicionType;
use Home\BackendBundle\Form\DisposicionFilterType;

/**
 * Disposicion controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/disposicion")
 */
class DisposicionController extends Controller
{

    /**
     * Lists all Disposicion entities.
     *
     * @Route("/", name="disposicion")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();
        //en la vista solo van los elementos que tienen estado 1, osea los elementos publicos
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $queryBuilder,
            $this->get('request')->query->get('page', 1),
            (isset($this->container->parameters['knp_paginator.page_range'])) ? $this->container->parameters['knp_paginator.page_range'] : 10
        );

        return array(
            'entities'   => $pagination,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Process filter request.
    *
    * @return array
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createFilterForm();
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('HomeBackendBundle:Disposicion')
            ->createQueryBuilder('a')
            ->where('a.estado = 1')
            ->orderBy('a.id', 'ASC')
        ;
        // Bind values from the request
        $filterForm->handleRequest($request);
        // Reset filter
        if ($filterForm->get('reset')->isClicked()) {
            $session->remove('DisposicionControllerFilter');
            $filterForm = $this->createFilterForm();
        }

        // Filter action
        if ($filterForm->get('filter')->isClicked()) {
            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('DisposicionControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('DisposicionControllerFilter')) {
                $filterData = $session->get('DisposicionControllerFilter');
                $filterForm = $this->createFilterForm($filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }
        /*if ($request->get('filter_action') == 'reset') {
                $session->remove('DisposicionControllerFilter');
            }

            // Filter action
            if ($request->get('filter_action') == 'filter') {
                // Bind values from the request
                $filterForm->handleRequest($request);

                if ($filterForm->isValid()) {
                    // Build the query from the given form object
                    $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                    // Save filter to session
                    $filterData = $request->get($filterForm->getName());
                    $session->set('DisposicionControllerFilter', $filterData);
                }
            } else {
                // Get filter from session
                if ($session->has('DisposicionControllerFilter')) {
                    $filterData = $session->get('DisposicionControllerFilter');
                    $filterForm->submit($filterData);
                    $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                }
            }*/

        return array($filterForm, $queryBuilder);
    }
    /**
    * Create filter form.
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createFilterForm($filterData = null)
    {
        $form = $this->createForm(new DisposicionFilterType(), $filterData, array(
            'action' => $this->generateUrl('disposicion'),
            'method' => 'POST',
        ));

        $form
            ->add('filter', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.index.filter',
                'attr'               => array('class' => 'btn btn-success btn-sm'),
            ))
            ->add('reset', 'submit', array(
                'translation_domain' => 'MWSimpleCrudGeneratorBundle',
                'label'              => 'views.index.reset',
                'attr'               => array('class' => 'btn btn-primary btn-sm'),
            ))
        ;

        return $form;
    }


    /**
     * Finds and displays a Disposicion entity.
     *
     * @Route("/{id}", name="disposicion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeBackendBundle:Disposicion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se encuentra la disposición.');
        }

        

        return array(
            'entity'      => $entity,
        );
    }


}