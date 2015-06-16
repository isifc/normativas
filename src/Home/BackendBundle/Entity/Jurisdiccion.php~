<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jurisdiccion
 *
 * @ORM\Table(name="Jurisdiccion")
 * @ORM\Entity
 */
class Jurisdiccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion", type="string", length=255, nullable=false)
     */
    private $denominacion;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacionCorta", type="string", length=255, nullable=false)
     */
    private $denominacionCorta;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUIT", type="integer", length=11, nullable=false)
     */
    private $CUIT;


    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return Jurisdiccion
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    
        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function __toString(){
        return $this->denominacion;
    }
    
    

    /**
     * Set denominacionCorta
     *
     * @param string $denominacionCorta
     * @return Jurisdiccion
     */
    public function setDenominacionCorta($denominacionCorta)
    {
        $this->denominacionCorta = $denominacionCorta;

        return $this;
    }

    /**
     * Get denominacionCorta
     *
     * @return string 
     */
    public function getDenominacionCorta()
    {
        return $this->denominacionCorta;
    }

    /**
     * Set CUIT
     *
     * @param integer $cUIT
     * @return Jurisdiccion
     */
   /* public function setCUIT(integer $cUIT)
    {
        $this->CUIT = $cUIT;

        return $this;
    }*/

    /**
     * Get CUIT
     *
     * @return integer
     */
    public function getCUIT()
    {
        return $this->CUIT;
    }

    

    /**
     * Set CUIT
     *
     * @param integer $cUIT
     * @return Jurisdiccion
     */
    public function setCUIT($cUIT)
    {
        $this->CUIT = $cUIT;

        return $this;
    }
}
