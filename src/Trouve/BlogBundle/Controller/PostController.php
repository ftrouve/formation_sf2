<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Trouve\BlogBundle\Form\Type\PostType;
use Trouve\BlogBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Template("TrouveBlogBundle:New:form.html.twig")
     */
    
    public function newAction(Request $request)
    {
        $post=new Post();
        $form = $this->createForm(new PostType(),$post);
        
        return array('form'=>$form->createView());
    }
    
}
