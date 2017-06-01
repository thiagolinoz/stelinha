<?php

namespace AppBundle\Entity;

/**
 * Cronograma
 */
class Cronograma
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $total_horas;

    /**
     * @var boolean
     */
    private $is_active = 1;

    /**
     * @var \AppBundle\Entity\Atividade
     */
    private $atividade;
    /**
     * @var \AppBundle\Entity\Horario
     */
    private $horario;

    private $observacao;

    private $horario_de;

    private $horario_ate;

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
     * Set totalHoras
     *
     * @param integer $totalHoras
     *
     * @return Cronograma
     */
    public function setTotalHoras($totalHoras)
    {
        $this->total_horas = $totalHoras;

        return $this;
    }

    /**
     * Get totalHoras
     *
     * @return integer
     */
    public function getTotalHoras()
    {
        return $this->total_horas;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Cronograma
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
     * Set atividade
     *
     * @param \AppBundle\Entity\Atividade $atividade
     *
     * @return Cronograma
     */
    public function setAtividade(\AppBundle\Entity\Atividade $atividade = null)
    {
        $this->atividade = $atividade;

        return $this;
    }

    /**
     * Get atividade
     *
     * @return \AppBundle\Entity\Atividade
     */
    public function getAtividade()
    {
        return $this->atividade;
    }


    /**
     * Set horario
     *
     * @param \AppBundle\Entity\Horario $horario
     *
     * @return Cronograma
     */
    public function setHorario(\AppBundle\Entity\Horario $horario = null)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get horario
     *
     * @return \AppBundle\Entity\Horario
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     *
     * @return Cronograma
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
     * @return Cronograma
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
     * @return Cronograma
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
}
