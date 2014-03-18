<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class IndexController extends Controller
{
    /**
     * @Template("TrouveBlogBundle:Index:index.html.twig")
     */
    
    public function indexAction()
    {
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
