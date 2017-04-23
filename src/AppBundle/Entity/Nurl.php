<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nurl
 *
 * @ORM\Table(name="nurl")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class Nurl
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;



    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;




    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;



    /**
     * @var int
     *
     * @ORM\Column(name="upvote", type="integer")
     */
    private $upvote;



    /**
     * @var int
     *
     * @ORM\Column(name="downvote", type="integer")
     */
    private $downvote;


    /**
     * @var \AppBundle\Entity\User  $user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="nurl")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var \AppBundle\Entity\Tag  $tag
     *
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="nurl")
     *
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *
     */
    private $tag;




    /**
     * @return int
     */
    public function getUpvote()
    {
        return $this->upvote;
    }

    /**
     * @param int $upvote
     */
    public function setUpvote($upvote)
    {
        $this->upvote = $upvote;
    }

    /**
     * @return int
     */
    public function getDownvote()
    {
        return $this->downvote;
    }

    /**
     * @param int $downvote
     */
    public function setDownvote($downvote)
    {
        $this->downvote = $downvote;
    }


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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }




    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Nurl
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
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Nurl
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }
}
