<?php

namespace Trouve\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template("TrouveBlogBundle:Default:index.html.twig")
     */
    public function indexAction($name)
    {
        return array('name' => $name);
	//return $this->redirect('http://google.fr');
    }
}
