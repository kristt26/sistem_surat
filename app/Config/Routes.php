<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->group('auth', function($routes){
    $routes->get('', 'Auth::index');
    $routes->post('check', 'Auth::check');
    $routes->get('logout', 'Auth::logout');
});
$routes->group('jenis', function($routes){
    $routes->get('', 'Jenis::index');
    $routes->get('read', 'Jenis::read');
    $routes->post('post', 'Jenis::post');
    $routes->put('put', 'Jenis::put');
    $routes->delete('delete/(:any)', 'Jenis::delete/$1');
});
$routes->group('unit', function($routes){
    $routes->get('', 'Unit::index');
    $routes->get('read', 'Unit::read');
    $routes->post('post', 'Unit::post');
    $routes->put('put', 'Unit::put');
    $routes->delete('delete/(:any)', 'Unit::delete/$1');
});
$routes->group('surat_masuk', function($routes){
    $routes->get('', 'Masuk::index');
    $routes->get('read', 'Masuk::read');
    $routes->post('post', 'Masuk::post');
    $routes->post('dispo', 'Masuk::dispo');
    $routes->put('put', 'Masuk::put');
    $routes->delete('delete/(:any)', 'Masuk::delete/$1');
});
$routes->group('surat_keluar', function($routes){
    $routes->get('', 'Keluar::index');
    $routes->get('read', 'Keluar::read');
    $routes->post('post', 'Keluar::post');
    $routes->put('put', 'Keluar::put');
    $routes->delete('delete/(:any)', 'Keluar::delete/$1');
});
$routes->group('laporan', function($routes){
    $routes->get('', 'Laporan::index');
    $routes->get('read/(:any)', 'Laporan::read/$1');
    $routes->get('print/(:any)', 'Laporan::print/$1');
});
$routes->group('user', function($routes){
    $routes->get('', 'User::index');
    $routes->get('read', 'User::read');
    $routes->post('post', 'User::post');
    $routes->put('put', 'User::put');
    $routes->delete('delete/(:any)', 'User::delete/$1');
});

$routes->group('disposisi', function($routes){
    $routes->get('', 'Disposisi::index');
    $routes->get('read', 'Disposisi::read');
    $routes->post('post', 'Disposisi::post');
    $routes->put('put', 'Disposisi::put');
    $routes->delete('delete/(:any)', 'Disposisi::delete/$1');
});
