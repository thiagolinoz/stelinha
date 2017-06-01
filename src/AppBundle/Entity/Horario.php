<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Horario{
	
	private $id;
	private $horario_de;
    private $horario_ate;
    private $dia;
    private $disponivel = 0;
	private $is_active = 1;
    private $user;
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
     * Set disponivel
     *
     * @param boolean $disponivel
     *
     * @return Horario
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;

        return $this;
    }

    /**
     * Get disponivel
     *
     * @return boolean
     */
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Horario
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Horario
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
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
     * Set dia
     *
     * @param integer $dia
     *
     * @return Horario
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return integer
     */
    public function getDia()
    {
        return $this->dia;
    }
}
