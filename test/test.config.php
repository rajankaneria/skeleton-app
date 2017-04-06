<?php

$config = [
    'modules' => [
        'DoctrineModule',
        'DoctrineORMModule',
        'Common',
        'Admin',
        'Application'
    ]
];

$config['test_namespaces'] = [
    'CommonTest' => realpath(__DIR__) . '/../module/Common/test/CommonTest',
    'ApplicationTest' => realpath(__DIR__) . '/../module/Application/test/ApplicationTest',
    'AdminTest' => realpath(__DIR__) . '/../module/Admin/test/AdminTest'
];

return $config;
