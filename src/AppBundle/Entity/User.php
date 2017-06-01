<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

class User implements AdvancedUserInterface, \Serializable
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $is_active = 1;
    private $role;
    private $nome;
    private $quarto;
    private $horarios;
    
    public function __construct()
    {
        $this->horarios = new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array($this->role);
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->is_active
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->is_active
        ) = unserialize($serialized);
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
    
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->is_active;
    }




    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return User
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set quarto
     *
     * @param string $quarto
     *
     * @return User
     */
    public function setQuarto($quarto)
    {
        $this->quarto = $quarto;

        return $this;
    }

    /**
     * Get quarto
     *
     * @return string
     */
    public function getQuarto()
    {
        return $this->quarto;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add horario
     *
     * @param \AppBundle\Entity\Horario $horario
     *
     * @return User
     */
    public function addHorario(\AppBundle\Entity\Horario $horario)
    {
        $this->horarios[] = $horario;

        return $this;
    }

    /**
     * Remove horario
     *
     * @param \AppBundle\Entity\Horario $horario
     */
    public function removeHorario(\AppBundle\Entity\Horario $horario)
    {
        $this->horarios->removeElement($horario);
    }

    /**
     * Get horarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHorarios()
    {
        return $this->horarios;
    }
}
