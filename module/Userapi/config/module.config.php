<?php

namespace Userapi;

return array(
     'controllers' => array(
         'invokables' => array(
             'Userapi\Controller\Userapi' => 'Userapi\Controller\UserapiController',
         ),
     ),

	// The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'userapi' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/userapi[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Userapi\Controller\Userapi',
                         'action'     => 'getAll',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'user' => __DIR__ . '/../view',
         ),
         'strategies' => array(
            'ViewJsonStrategy'
          )
     ),
	'doctrine' => array(
	  	'driver' => array(
	    	'userapi_entities' => array(
	      		'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
	      		'cache' => 'array',
	      		'paths' => array(__DIR__ . '/../src/Userapi/Entity')
	    	),
	    	'orm_default' => array(
	      		'drivers' => array(
	        		'Userapi\Entity' => 'userapi_entities'
	      		)
			)
	    )
	),


 );