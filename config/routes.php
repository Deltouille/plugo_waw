<?php

const ROUTES = [
    'home' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'home',
    ],
    'register' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register',
    ],
    'login' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'login',
    ],
    'logout' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'logout',
    ],
    'allRoadTrip' => [
        'controller' => App\Controller\RoadTripController::class,
        'method' => 'allRoadTrip'
    ],
    'addRoadTrip' => [
        'controller' => \App\Controller\RoadTripController::class,
        'method' => 'addRoadTrip'
    ],
    'detailsRoadTrip' => [
        'controller' => \App\Controller\RoadTripController::class,
        'method' => 'detailsRoadTrip'
    ],
    'removeRoadTrip' => [
        'controller' => \App\Controller\RoadTripController::class,
        'method' => 'removeRoadTrip'
    ],
    'updateRoadTrip' => [
        'controller' => \App\Controller\RoadTripController::class,
        'method' => 'updateRoadTrip'
    ],
    'removeCheckPoint' => [
        'controller' => \App\Controller\CheckpointController::class,
        'method' => 'deleteCheckPoint',
    ],
    'updateCheckPoint' => [
        'controller' => \App\Controller\CheckpointController::class,
        'method' => 'updateCheckPoint',
    ],
    'userinfo' => [
        'controller' => \App\Controller\UserController::class,
        'method' => 'getRoadTripsOfUser',
    ],
    'espaceMembre' => [
        'controller' => \App\Controller\UserController::class,
        'method' => 'espaceMembre',
    ]
];