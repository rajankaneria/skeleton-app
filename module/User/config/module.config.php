<?php

namespace User;

return array(
     'controllers' => array(
         'invokables' => array(
             'User\Controller\User' => 'User\Controller\UserController',
         ),
     ),

	// The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'user' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/user[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'User\Controller\User',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'user' => __DIR__ . '/../view',
         ),
     ),
	'doctrine' => array(
	  	'driver' => array(
	    	'user_entities' => array(
	      		'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
	      		'cache' => 'array',
	      		'paths' => array(__DIR__ . '/../src/User/Entity')
	    	),
	    	'orm_default' => array(
	      		'drivers' => array(
	        		'User\Entity' => 'user_entities'
	      		)
			)
	    )
	),


 );