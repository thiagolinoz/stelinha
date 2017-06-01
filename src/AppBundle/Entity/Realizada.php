<?php
namespace AppBundle\Entity;

class Realizada
{
	private $observacao;
	private $horario_de;
    private $horario_ate;
    private $is_active = 1;
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
     * Set observacao
     *
     * @param string $observacao
     *
     * @return Realizada
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set horarioDe
     *
     * @param \DateTime $horarioDe
     *
     * @return Realizada
     */
    public function setHorarioDe($horarioDe)
    {
        $this->horario_de = new \ DateTime($horarioDe);

        return $this;
    }

    /**
     * Get horarioDe
     *
     * @return \DateTime
     */
    public function getHorarioDe()
    {
        return $this->horario_de->format("H:i:s");
    }

    /**
     * Set horarioAte
     *
     * @param \DateTime $horarioAte
     *
     * @return Realizada
     */
    public function setHorarioAte($horarioAte)
    {
        $this->horario_ate = new \ DateTime($horarioAte);

        return $this;
    }

    /**
     * Get horarioAte
     *
     * @return \DateTime
     */
    public function getHorarioAte()
    {
        return $this->horario_ate->format("H:i:s");
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Realizada
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
     * Set cronograma
     *
     * @param \AppBundle\Entity\Cronograma $cronograma
     *
     * @return Realizada
     */
    public function setCronograma(\AppBundle\Entity\Cronograma $cronograma = null)
    {
        $this->cronograma = $cronograma;

        return $this;
    }

    /**
     * Get cronograma
     *
     * @return \AppBundle\Entity\Cronograma
     */
    public function getCronograma()
    {
        return $this->cronograma;
    }
}
