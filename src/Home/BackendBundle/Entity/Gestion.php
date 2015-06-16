<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gestion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Gestion
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
     * @var string
     *
     * @ORM\Column(name="ministro", type="string", length=255)
     */
    private $ministro;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=255)
     */
    private $periodo;

    /**
     * @ORM\OneToMany(targetEntity="Disposicion", mappedBy="gestion")
     */
    private $disposiciones;
    

    

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
     * Set ministro
     *
     * @param string $ministro
     * @return Gestion
     */
    public function setMinistro($ministro)
    {
        $this->ministro = $ministro;

        return $this;
    }

    /**
     * Get ministro
     *
     * @return string 
     */
    public function getMinistro()
    {
        return $this->ministro;
    }

    /**
     * Set periodo
     *
     * @param string $periodo
     * @return Gestion
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string 
     */
    public function getPeriodo()
    {
        return $this->periodo;
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
     * @return Gestion
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


   public function __toString(){
        return $this->periodo;
    } 
}
