<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Trouve\BlogBundle\Form\Type\PostType;
use Trouve\BlogBundle\Entity\Post;

class CategoryController extends Controller
{
  
    /**
     * @Template("TrouveBlogBundle:Category:show.html.twig")
     */
    public function showAction($slug)
    {
         $repository= $this->getDoctrine()
                ->getRepository('TrouveBlogBundle:Category');
         $category=$repository->findOneBySlug($slug);
         
         if(!$category){
             throw $this->createNotFoundException($this->get('translator')->trans('This category does not exist'));
         }
        

        return array('category'=> $category);
    }
}
