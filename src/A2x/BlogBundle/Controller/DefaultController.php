<?php

namespace A2x\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('A2xBlogBundle:Default:index.html.twig');
    }
}
