<?php

namespace Vince\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Vince:BlogBundle:Default:index.html.twig', array('name' => $name));
        return new Response("Hello World!", 200);
    }
}
