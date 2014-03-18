<?php

namespace Trouve\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Trouve\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Trouve\BlogBundle\Entity\CommentRepository")
 */
class Comment extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="Cascade", nullable=false)
     */
    protected $post;
    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body;

   
    
}
