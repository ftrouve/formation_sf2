<?php

namespace Trouve\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Trouve\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Trouve\BlogBundle\Entity\CategoryRepository")
 */
class Category extends AbstractEntity
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    protected $name;
  
     /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="categories")
     */
    protected $posts;
    
    public function __construct($data = array()) {
        $this->posts = new ArrayCollection();
        parent::__construct(array());
        }
}
