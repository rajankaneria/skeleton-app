<?php
return array(
    'modules' => array(
        'Application',
        'TwbBundle'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
    'console' => array(
        'router' => array(),
    ),
);
