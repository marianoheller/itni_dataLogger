<?php
// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{

    const JWT_SECRET_KEY = "dostoievski";

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank()
     */
    private $password;



    /**
     * @ORM\Column(name="is_device", type="boolean", options={"default":false})
     * @Assert\NotBlank()
     */
    private $device;

    /**
     * @ORM\Column(name="is_admin", type="boolean", options={"default":false})
     * @Assert\NotBlank()
     */
    private $admin;


    /**
     * @ORM\Column(name="is_active", type="boolean", options={"default":true})
     * @Assert\NotBlank()
     */
    private $active;


    public function __construct($username)
    {
        $this->active = true;
        $this->admin = false;
        $this->device = false;

        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));

        $this->username = $username;
    }



    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        if ( $this->device == true) {
            return array('ROLE_DEVICE');
        }
        else if ( $this->admin == true) {
            return array('ROLE_ADMIN');
        }
        else {
            return array('ROLE_USER');
        }

    }

    public function eraseCredentials()
    {
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
        return $this->active;
    }

    public function setDevice($isDevice) {
        $this->device = $isDevice;
    }

    public function setAdmin($isAdmin) {
        $this->admin = $isAdmin;
    }



    public function setPassword($password)
    {
        $this->password = $password;
    }



    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
            $this->active,
            $this->device,
            $this->admin
        ));
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
            $this->active,
            $this->device,
            $this->admin
            ) = unserialize($serialized);
    }
}