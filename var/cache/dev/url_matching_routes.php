<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/character' => [[['_route' => 'character', '_controller' => 'App\\Controller\\CharacterController::index'], null, null, null, false, false, null]],
        '/character/create' => [[['_route' => 'character_create', '_controller' => 'App\\Controller\\CharacterController::create'], null, ['POST' => 0, 'HEAD' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/character/display/([^/]++)(*:34)'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:69)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        34 => [[['_route' => 'character_display', '_controller' => 'App\\Controller\\CharacterController::display'], ['identifier'], null, null, false, true, null]],
        69 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
