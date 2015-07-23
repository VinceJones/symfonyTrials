<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('vince_blog_homepage', new Route('/hello/{name}', array(
    '_controller' => 'VinceBlogBundle:Default:index',
)));

return $collection;
