<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
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
    $routes->get('read', 'Laporan::read');
    $routes->post('post', 'Laporan::post');
    $routes->put('put', 'Laporan::put');
    $routes->delete('delete/(:any)', 'Laporan::delete/$1');
});
