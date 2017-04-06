<?php

namespace CleverSwarm\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remote
 *
 * @ORM\Table(name="remote")
 * @ORM\Entity(repositoryClass="CleverSwarm\BackendBundle\Repository\RemoteRepository")
 */
class Remote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text")
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity="CleverSwarm\UserBundle\Entity\User", inversedBy="remotes")
     */
    private $user;    


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
     * Set name
     *
     * @param string $name
     *
     * @return Remote
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Remote
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Remote
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set user
     *
     * @param \CleverSwarm\UserBundle\Entity\User $user
     *
     * @return Remote
     */
    public function setUser(\CleverSwarm\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        $user->addRemote($this);

        return $this;
    }

    /**
     * Get user
     *
     * @return \CleverSwarm\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
