<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true, unique=true, length=180)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $password;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastLogin;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $tokenVerifier;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    protected $roles;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $passwordRequestToken;

    /*
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Labs\Customer", inversedBy="users")
     * @ORM\JoinTable(name="labs_customers_users",
     *      joinColumns={@ORM\JoinColumn(name="customer_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *      )
     */
    /*
    protected $customers;
    */

    public function __construct()
    {
        $this->updateTokenVerifier();
    }

    public function __toString()
    {
        return (string)$this->getEmail();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenVerifier()
    {
        return $this->tokenVerifier;
    }

    /**
     * @param mixed $tokenVerifier
     */
    public function setTokenVerifier($tokenVerifier)
    {
        $this->tokenVerifier = $tokenVerifier;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(
            [
                $this->id,
                $this->username,
                $this->password,
                // see section on salt below
                // $this->salt,
            ]
        );
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function hasRole($role)
    {
        return in_array($role, $this->roles);
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function updateTokenVerifier()
    {
        $this->tokenVerifier = time();
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param mixed $passwordRequestToken
     */
    public function setPasswordRequestToken($passwordRequestToken)
    {
        $this->passwordRequestToken = $passwordRequestToken;
    }

    /**
     * @return mixed
     */
    public function getPasswordRequestToken()
    {
        return $this->passwordRequestToken;
    }

}
