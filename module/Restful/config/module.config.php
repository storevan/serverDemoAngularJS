<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Restful;

return array(
    'router' => array(
        'routes' => array(
            'rest' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/rest',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Restful\Controller',
                        'controller'    => 'Restful',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Restful\Controller\Index' => Controller\IndexController::class,
            'Restful\Controller\Restful' => Controller\RestfulController::class,
            'Restful\Controller\Location' => Controller\LocationController::class,
            'Restful\Controller\User' => Controller\UserController::class,
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
