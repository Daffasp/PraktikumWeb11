<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Page::home');

$routes->group('admin', function($routes) {
    $routes->get('article', 'article::admin_index');
    $routes->add('article/add', 'article::add');
    $routes->add('article/edit/(:any)', 'article::edit/$1');
    $routes->get('article/delete/(:any)', 'article::delete/$1');
    });
$routes->get('/article', 'Article::index');
$routes->get('/article/(:segment)', 'Article::view/$1'); // Dynamic slug

$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');

