<?php

namespace E100\CoreBundle\Twig\Extension;

class Url extends \Twig_Extension
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFunctions() 
    {
        return array(
            'is_current_route' => new \Twig_Function_Method($this, 'isCurrentRoute'),
        );
    }

    public function isCurrentRoute($routeName)
    {
        return $routeName == $this->container->get('request')->get('_route');
    }

    public function getName()
    {
        return 'e100_url';
    }
}