<?php

namespace Trouve\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('id' => 'main_navigation', 'class' => 'nav'));
        $menu->addChild('Posts', array('route' => 'Trouve_AdminBundle_Post_list'));
        $menu->addChild('Categories', array('route' => 'Trouve_AdminBundle_Category_list'));
        $menu->addChild('Comments', array('route' => 'Trouve_AdminBundle_Comment_list'));
        $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));
        
        return $menu;
    }
}