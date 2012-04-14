<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(

            ),

            /**
             * Template files and path to default template folder
             */
            'Zend\View\Resolver\TemplateMapResolver' => array(
                'parameters' => array(
                    'map'  => array(
//                        'layouts/layout' => __DIR__ . '/../views/layouts/layout.twig',
                    ),
                ),
            ),
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'paths'  => array(
                        'core' => __DIR__ . '/../views',
                    ),
                ),
            ),

            /**
             * Helper classes
             */
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                    'map' => array(
                        'dots' => 'Dots\Helper\Dots',
                    ),
                ),
            ),

            /**
             * Routes
             */
            'Zend\Mvc\Router\RouteStack' => array(
                'parameters' => array(
                    'routes' => array(
                        'dots-pages' => array(
                            'type' => 'Zend\Mvc\Router\Http\Segment',
                            'options' => array(
                                'route' => '/dots-pages[/:action][/]',
                                'constraints' => array(
                                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                                'defaults' => array(
                                    'controller' => 'dots-pages',
                                    'action' => 'index',
                                ),
                            ),
                        ),
                    ),
                ),
            ),

        ),
    ),
);