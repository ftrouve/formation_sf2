<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Trouve\BlogBundle\Entity\Category;


class IndexController extends Controller
{
    /**
     * @Template("TrouveBlogBundle:Index:index.html.twig")
     */
    
    public function indexAction()
    {
        //creation d'une categorie
        $category=new Category();
        $category->setName('categorie1');
        $em=$this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();
        
        
        $tabPosts = array(
            array('title'=>"post1",'isPublish'=>false)
            ,
            array('title'=>"post2",'isPublish'=>true)
            ,
            array('title'=>"post3",'isPublish'=>false)
            
        );
        return array('tabPosts'=> $tabPosts);
    }
    
   
}
