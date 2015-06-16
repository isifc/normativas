<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oficina
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\OficinaRepository")
 */
class Oficina
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\OneToMany(targetEntity="Disposicion", mappedBy="oficina", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
    */
    private $disposiciones;
    

    /**
    * @ORM\ManyToOne(targetEntity="Jurisdiccion", cascade={"all"}, fetch="EAGER")
    */
    private $jurisdiccion; 

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_corta", type="string", length=255)
     */
    private $denominacionCorta;

    /**
     * @var integer
     *
     * @ORM\Column(name="OfiCUE", type="integer")
     */
    private $ofiCUE;

    /**
     * @var integer
     *
     * @ORM\Column(name="OfiCUI", type="integer")
     */
    private $ofiCUI;

    /**
     * @var integer
     *
     * @ORM\Column(name="JurMarcBaj", type="integer")
     */
    private $jurMarcBaj;





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
     * Set nombre
     *
     * @param string $nombre
     * @return Oficina
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set denominacionCorta
     *
     * @param string $denominacionCorta
     * @return Oficina
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
     * Set ofiCUE
     *
     * @param integer $ofiCUE
     * @return Oficina
     */
    public function setOfiCUE($ofiCUE)
    {
        $this->ofiCUE = $ofiCUE;

        return $this;
    }

    /**
     * Get ofiCUE
     *
     * @return integer 
     */
    public function getOfiCUE()
    {
        return $this->ofiCUE;
    }

    /**
     * Set ofiCUI
     *
     * @param integer $ofiCUI
     * @return Oficina
     */
    public function setOfiCUI($ofiCUI)
    {
        $this->ofiCUI = $ofiCUI;

        return $this;
    }

    /**
     * Get ofiCUI
     *
     * @return integer 
     */
    public function getOfiCUI()
    {
        return $this->ofiCUI;
    }

    /**
     * Set jurMarcBaj
     *
     * @param integer $jurMarcBaj
     * @return Oficina
     */
    public function setJurMarcBaj($jurMarcBaj)
    {
        $this->jurMarcBaj = $jurMarcBaj;

        return $this;
    }

    /**
     * Get jurMarcBaj
     *
     * @return integer 
     */
    public function getJurMarcBaj()
    {
        return $this->jurMarcBaj;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disposiciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add disposiciones
     *
     * @param \Home\BackendBundle\Entity\Disposicion $disposiciones
     * @return Oficina
     */
    public function addDisposicione(\Home\BackendBundle\Entity\Disposicion $disposiciones)
    {
        $this->disposiciones[] = $disposiciones;

        return $this;
    }

    /**
     * Remove disposiciones
     *
     * @param \Home\BackendBundle\Entity\Disposicion $disposiciones
     */
    public function removeDisposicione(\Home\BackendBundle\Entity\Disposicion $disposiciones)
    {
        $this->disposiciones->removeElement($disposiciones);
    }

    /**
     * Get disposiciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisposiciones()
    {
        return $this->disposiciones;
    }

    /**
     * Set jurisdiccion
     *
     * @param \Home\BackendBundle\Entity\Jurisdiccion $jurisdiccion
     * @return Oficina
     */
    public function setJurisdiccion(\Home\BackendBundle\Entity\Jurisdiccion $jurisdiccion = null)
    {
        $this->jurisdiccion = $jurisdiccion;

        return $this;
    }

    /**
     * Get jurisdiccion
     *
     * @return \Home\BackendBundle\Entity\Jurisdiccion 
     */
    public function getJurisdiccion()
    {
        return $this->jurisdiccion;
    }


    public function __toString(){
        return $this->denominacionCorta;
    } 
}
