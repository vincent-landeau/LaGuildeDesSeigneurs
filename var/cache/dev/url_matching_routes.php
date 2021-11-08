<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/character' => [[['_route' => 'character_redirect_index', '_controller' => 'App\\Controller\\CharacterController::redirectIndex'], null, ['HEAD' => 0, 'GET' => 1], null, false, false, null]],
        '/character/index' => [[['_route' => 'character_index', '_controller' => 'App\\Controller\\CharacterController::index'], null, ['HEAD' => 0, 'GET' => 1], null, false, false, null]],
        '/character/create' => [[['_route' => 'character_create', '_controller' => 'App\\Controller\\CharacterController::create'], null, ['HEAD' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/character/(?'
                    .'|d(?'
                        .'|isplay/((?:[a-z0-9]{40}))(*:50)'
                        .'|elete/((?:[a-z0-9]{40}))(*:81)'
                    .')'
                    .'|modify/((?:[a-z0-9]{40}))(*:114)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:151)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        50 => [[['_route' => 'character_display', '_controller' => 'App\\Controller\\CharacterController::display'], ['identifier'], ['HEAD' => 0, 'GET' => 1], null, false, true, null]],
        81 => [[['_route' => 'character_delete', '_controller' => 'App\\Controller\\CharacterController::delete'], ['identifier'], ['DELETE' => 0, 'HEAD' => 1], null, false, true, null]],
        114 => [[['_route' => 'character_modify', '_controller' => 'App\\Controller\\CharacterController::modify'], ['identifier'], ['PUT' => 0, 'HEAD' => 1], null, false, true, null]],
        151 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
