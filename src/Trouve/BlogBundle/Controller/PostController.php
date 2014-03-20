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
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            
            //controller
            $this->get('session')->getFlashBag()->add('success','Le post a été enregistré');
            
            
            return $this->redirect($this->generateUrl('trouve_blog_newPost'));
        }
        
        /*$message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('toto@toto.fr')
                ->setTo('frantz.trouve@free.fr')
                ->setBody('bonjour');
        $this->get('mailer')->send($message);
         */
         
        
        return array('form'=>$form->createView());
    }
    /**
     * @Template("TrouveBlogBundle:Post:show.html.twig")
     */
    public function showAction($slug)
    {
         $repository= $this->getDoctrine()
                ->getRepository('TrouveBlogBundle:Post');
         $post=$repository->findOneBySlug($slug);
         
         if(!$post){
             throw $this->createNotFoundException($this->get('translator')->trans('This post does not exist'));
         }
        

        return array('post'=> $post);
    }
}
