<?php

namespace CleversWarm\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="CleversWarm\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\OneToMany(targetEntity="CleversWarm\BackendBundle\Entity\Remote", mappedBy="user")
     */
    private $remotes;    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add remote
     *
     * @param \CleversWarm\BackendBundle\Entity\Remote $remote
     *
     * @return User
     */
    public function addRemote(\CleversWarm\BackendBundle\Entity\Remote $remote)
    {
        $this->remotes[] = $remote;

        return $this;
    }

    /**
     * Remove remote
     *
     * @param \CleversWarm\BackendBundle\Entity\Remote $remote
     */
    public function removeRemote(\CleversWarm\BackendBundle\Entity\Remote $remote)
    {
        $this->remotes->removeElement($remote);
    }

    /**
     * Get remotes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRemotes()
    {
        return $this->remotes;
    }
}