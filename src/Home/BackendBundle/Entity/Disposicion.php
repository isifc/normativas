<?php

namespace Home\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Disposicion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\BackendBundle\Entity\DisposicionRepository")
 */
class Disposicion
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
    * @ORM\ManyToOne(targetEntity="Oficina", inversedBy="disposiciones" ,fetch="EAGER")ç
    * Assert\NotNull(message="no puede ser nulo")
    */
    private $oficina; 

    /**
    * @ORM\ManyToOne(targetEntity="Tema", fetch="EAGER")
    * @Assert\NotNull(message="no puede ser nulo")
    */
    private $tema;

    /**
    * @ORM\ManyToOne(targetEntity="Gestion", inversedBy="disposiciones" ,fetch="EAGER")
    */
    private $gestion;

    
    /**
    * @ORM\OneToOne(targetEntity="File", mappedBy="disposicion", cascade={"persist", "remove"})
    * @Assert\NotNull(message= "No puede estar vacio")
    */
    private $file; 


    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer",unique=true)
     * @Assert\NotNull(message="no puede ser nulo")
     * @Assert\Type(
     *     type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_resolucion", type="datetime")
     * @Assert\Date( message= "ingrese una fecha valida")
     */
    private $fecha;

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     * @Assert\NotNull(message= "Tenes que registrar una descripción")
     */
    private $descripcion;


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
     * Set numero
     *
     * @param integer $numero
     * @return Disposicion
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Disposicion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Disposicion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set oficina
     *
     * @param \Home\BackendBundle\Entity\Oficina $oficina
     * @return Disposicion
     */
    public function setOficina(\Home\BackendBundle\Entity\Oficina $oficina = null)
    {
        $this->oficina = $oficina;

        return $this;
    }

    /**
     * Get oficina
     *
     * @return \Home\BackendBundle\Entity\Oficina 
     */
    public function getOficina()
    {
        return $this->oficina;
    }

    /**
     * Set tema
     *
     * @param \Home\BackendBundle\Entity\Tema $tema
     * @return Disposicion
     */
    public function setTema(\Home\BackendBundle\Entity\Tema $tema = null)
    {
        $this->tema = $tema;

        return $this;
    }

    /**
     * Get tema
     *
     * @return \Home\BackendBundle\Entity\Tema 
     */
    public function getTema()
    {
        return $this->tema;
    }

    /**
     * Set estado
     *
     * @param \Boolean $estado
     * @return Disposicion
     */
    public function setEstado($estado)
    {
        if (is_null($estado)){
            $estado=0;
        }
        $this->estado = $estado;
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set file
     *
     * @param \Home\BackendBundle\Entity\File $file
     * @return Disposicion
     */
    public function setFile(\Home\BackendBundle\Entity\File $file = null)
    {
        $this->file = $file;
        $file-> setDisposicion($this);
        return $this;
    }

    /**
     * Get file
     *
     * @return \Home\BackendBundle\Entity\File 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set gestion
     *
     * @param \Home\BackendBundle\Entity\Gestion $gestion
     * @return Disposicion
     */
    public function setGestion(\Home\BackendBundle\Entity\Gestion $gestion = null)
    {
        $this->gestion = $gestion;

        return $this;
    }

    /**
     * Get gestion
     *
     * @return \Home\BackendBundle\Entity\Gestion 
     */
    public function getGestion()
    {
        return $this->gestion;
    }
}
