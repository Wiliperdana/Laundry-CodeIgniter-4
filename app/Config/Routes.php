<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login
$routes->get('/', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// error 404
$routes->get('unauthorized', 'NotFoundController::index');

// outlet
$routes->group('outlet', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'OutletController::index');
    $routes->get('create', 'OutletController::create');
    $routes->post('store', 'OutletController::store');
    $routes->get('edit/(:num)', 'OutletController::edit/$1');
    $routes->post('update/(:num)', 'OutletController::update/$1');
    $routes->get('delete/(:num)', 'OutletController::delete/$1');
});

// member
$routes->group('member', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'MemberController::index');
    $routes->get('create', 'MemberController::create');
    $routes->post('store', 'MemberController::store');
    $routes->get('edit/(:num)', 'MemberController::edit/$1');
    $routes->post('update/(:num)', 'MemberController::update/$1');
    $routes->get('delete/(:num)', 'MemberController::delete/$1');
});

// paket
$routes->group('paket', ['filter' => 'auth'], function($routes) {
    $routes->get('(:num)', 'PaketController::index/$1');
    $routes->post('(:num)/store', 'PaketController::store/$1');
    $routes->get('(:num)/edit/(:num)', 'PaketController::edit/$1/$2');
    $routes->post('(:num)/update/(:num)', 'PaketController::update/$1/$2');
    $routes->get('(:num)/delete/(:num)', 'PaketController::delete/$1/$2');
});

// user
$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('(:num)', 'UserController::index/$1');
    $routes->post('(:num)/store', 'UserController::store/$1');
    $routes->get('(:num)/edit/(:num)', 'UserController::edit/$1/$2');
    $routes->post('(:num)/update/(:num)', 'UserController::update/$1/$2');
    $routes->get('(:num)/delete/(:num)', 'UserController::delete/$1/$2');
});

// transaksi
$routes->group('transaksi', ['filter' => 'auth'], function($routes) {
    $routes->get('(:num)', 'TransaksiController::index/$1');
    $routes->post('(:num)/store', 'TransaksiController::store/$1');
    $routes->get('(:num)/detail', 'TransaksiController::detail/$1/$2');
    $routes->get('(:num)/edit/(:num)', 'TransaksiController::edit/$1/$2');
    $routes->post('(:num)/update/(:num)', 'TransaksiController::update/$1/$2');
    $routes->get('(:num)/delete/(:num)', 'TransaksiController::delete/$1/$2');
    $routes->get('(:num)/detail/(:num)', 'TransaksiController::detailShow/$1/$2');
    $routes->post('(:num)/print/(:num)', 'TransaksiController::print/$1/$2');
    $routes->get('(:num)/printAll', 'TransaksiController::printAll/$1/$2');
    // khusus owner
    $routes->get('(:num)/detail/owner', 'TransaksiController::detailOwner/$1/$2');
});