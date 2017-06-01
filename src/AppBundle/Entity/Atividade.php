<?php
namespace AppBundle\Entity;

class Atividade
{
	private $local;
	private $horario_de;
    private $horario_ate;
	private $descricao;
    private $is_active = 1;
    private $extra = 0;
    private $quantidade;
    private $cronograma;
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
   


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
     * Set local
     *
     * @param string $local
     *
     * @return Atividade
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set horario_de
     *
     * @param string $horario_de
     *
     * @return Atividade
     */
    public function setHorarioDe($horarioDe)
    {
        $this->horario_de = new \ DateTime($horarioDe);

        return $this;
    }

    /**
     * Get horario_de
     *
     * @return string
     */
    public function getHorarioDe()
    {
        return $this->horario_de->format("H:i:s");
    }

        /**
     * Set horario_ate
     *
     * @param string $horario_ate
     *
     * @return Atividade
     */
    public function setHorarioAte($horarioAte)
    {
        $this->horario_ate = new \ DateTime($horarioAte);

        return $this;
    }

    /**
     * Get horario_ate
     *
     * @return string
     */
    public function getHorarioAte()
    {
        return $this->horario_ate->format("H:i:s");
    }

 
    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Atividade
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Atividade
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set extra
     *
     * @param boolean $extra
     *
     * @return Atividade
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return boolean
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     *
     * @return Atividade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cronograma = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cronograma
     *
     * @param \AppBundle\Entity\Cronograma $cronograma
     *
     * @return Atividade
     */
    public function addCronograma(\AppBundle\Entity\Cronograma $cronograma)
    {
        $this->cronograma[] = $cronograma;

        return $this;
    }

    /**
     * Remove cronograma
     *
     * @param \AppBundle\Entity\Cronograma $cronograma
     */
    public function removeCronograma(\AppBundle\Entity\Cronograma $cronograma)
    {
        $this->cronograma->removeElement($cronograma);
    }

    /**
     * Get cronograma
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCronograma()
    {
        return $this->cronograma;
    }
}
