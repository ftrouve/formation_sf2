<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Trouve\BlogBundle\Entity\Category;
use Trouve\BlogBundle\Entity\Post;

class IndexController extends Controller
{
    /**
     * @Template("TrouveBlogBundle:Index:index.html.twig")
     */
    
    public function indexAction()
    {
        //creation d'une categorie
        /*$category=new Category();
        $category->setName('categorie1');
        $em=$this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();*/
        
        //creation d'un post
        /*$post=new Post();
        $post->setTitle('monPremierPost');
        $post->setBody('azertyuiop');
        $post->setIsPublish(true);
        $em=$this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();*/
        
        /*$repository=$this->getDoctrine()->getRepository('TrouveBlogBundle:Category');
        $category=$repository->find(1);
        
        $repository=$this->getDoctrine()->getRepository('TrouveBlogBundle:Post');
        $post=$repository->find(1);
        $category->getPosts()->add($post); 
        $em=$this->getDoctrine()->getManager();
        $em->flush();*/
        
        $posts= $this->getDoctrine()
                ->getRepository('TrouveBlogBundle:Post')
                ->getPublishedPosts();

        $categories= $this->getDoctrine()
                ->getRepository('TrouveBlogBundle:Category')
                ->getPublishedCategories();
        
        return array('posts'=> $posts, 'categories'=> $categories);
    }
    
   
}
