<?php

namespace Trouve\BlogBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
       
        //home
        $menu->addChild($this->container->get('translator')->trans('Home'), array('route' => 'trouve_blog_homepage', 
            'linkAttributes' => array('class' => 'blog-nav-item')
            ));
        
       // categories
        $em = $this->container->get('doctrine.orm.entity_manager');
        $categories = $em->getRepository('TrouveBlogBundle:Category')->findAll();
        foreach ($categories as $category) {
            $menu->addChild($category->getName(), array(
                'route' => 'trouve_blog_categoryShow',
                'routeParameters' => array('slug' => $category->getSlug()),
                'linkAttributes' => array('class' => 'blog-nav-item'),
            ));
        }
       
        //admin
        $menu->addChild($this->container->get('translator')->trans('Admin'), array('route' => '@TrouveBlogBundle:trouve_blog_admin', 
            'linkAttributes' => array('class' => 'blog-nav-item')
            ));
        return $menu;
    }
}