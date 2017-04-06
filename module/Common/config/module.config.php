<?php
namespace Common;

use Zend\Authentication\AuthenticationService;
use Common\Entity\Audit\EntityAuditListener;

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Authentication\AuthenticationService' => function ($sm) {
                return new AuthenticationService();
            }
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator'
        ),
        'translator' => array(
            'locale' => 'en_US',
            'translation_file_patterns' => array(
                array(
                    'type' => 'gettext',
                    'base_dir' => __DIR__ . '/../language',
                    'pattern' => '%s.mo',
                ),
            ),
        ),
        'invokables' => [
            EntityAuditListener::class => EntityAuditListener::class
        ]
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
        'eventmanager'  => [
            'orm_default' => [
                'subscribers' => [
                    EntityAuditListener::class
                ],
            ],
        ],
    ),
    'asset_bundle' => array(
        'assets' => array(
            'less' => array('@zfRootPath/vendor/twitter/bootstrap/less/bootstrap.less')
        )
    ),
);