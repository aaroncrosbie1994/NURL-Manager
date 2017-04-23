<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var bool
     *
     * @ORM\Column(name="approved", type="boolean")
     */
    private $approved;



    /**
     * @var int
     *
     * @ORM\Column(name="upvote", type="integer")
     */
    private $upvote;

    /**
     * @var int
     *
     * @ORM\Column(name="downvote", type="integer")#
     */
    private $downvote;

//    /**
//     * @var \AppBundle\Entity\Nurl  $nurl
//     *
//     * @ORM\ManyToOne(targetEntity="Nurl", inversedBy="tag")
//     *
//     * @ORM\JoinColumn(name="nurl_id", referencedColumnName="id")
//     *
//     */
//    private $nurl;



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
     * Set tag
     *
     * @param string $tag
     *
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     *
     * @return Tag
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set upvote
     *
     * @param integer $upvote
     *
     * @return Tag
     */
    public function setUpvote($upvote)
    {
        $this->upvote = $upvote;

        return $this;
    }

    /**
     * Get upvote
     *
     * @return integer
     */
    public function getUpvote()
    {
        return $this->upvote;
    }

    /**
     * Set downvote
     *
     * @param integer $downvote
     *
     * @return Tag
     */
    public function setDownvote($downvote)
    {
        $this->downvote = $downvote;

        return $this;
    }

    /**
     * Get downvote
     *
     * @return integer
     */
    public function getDownvote()
    {
        return $this->downvote;
    }

//    /**
//     * Set nurl
//     *
//     * @param \AppBundle\Entity\Nurl $nurl
//     *
//     * @return Tag
//     */
//    public function setNurl(\AppBundle\Entity\Nurl $nurl = null)
//    {
//        $this->nurl = $nurl;
//
//        return $this;
//    }
//
//    /**
//     * Get nurl
//     *
//     * @return \AppBundle\Entity\Nurl
//     */
//    public function getNurl()
//    {
//        return $this->nurl;
//    }
}
