<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('/SaveMusic', 'MainController::UploadMusic');
$routes->get('/SearchMusic', 'MainController::SearchMusic');
$routes->post('createPlaylist', 'MainController::createPlaylist');
$routes->post('addToPlaylist', 'MainController::addToPlaylist');
$routes->get('/musicplaylist/(:any)', 'MainController::musicplaylist/$1');
