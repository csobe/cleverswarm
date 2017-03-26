<?php

namespace CleversWarm\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="CleversWarm\BackendBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="posted", type="datetime")
     */
    private $posted;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var int
     *
     * @ORM\Column(name="enabled", type="integer")
     */
    private $enabled;

    /**
     * @ORM\ManyToOne(targetEntity="CleversWarm\UserBundle\Entity\User", inversedBy="posts")
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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function settitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function gettitle()
    {
        return $this->title;
    }

    /**
     * Set posted
     *
     * @param \DateTime $posted
     *
     * @return Post
     */
    public function setPosted($posted)
    {
        $this->posted = $posted;

        return $this;
    }

    /**
     * Get posted
     *
     * @return \DateTime
     */
    public function getPosted()
    {
        return $this->posted;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Post
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     *
     * @return Post
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return int
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set user
     *
     * @param \CleversWarm\UserBundle\Entity\User $user
     *
     * @return Post
     */
    public function setUser(\CleversWarm\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        $user->addPost($this);

        return $this;
    }

    /**
     * Get user
     *
     * @return \CleversWarm\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
