<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route utama
$routes->get('/', 'Page::home');

// Group untuk admin dengan filter auth
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('article', 'Article::admin_index');              // List artikel untuk admin
    $routes->add('article/add', 'Article::add');                  // Tambah artikel
    $routes->add('article/edit/(:any)', 'Article::edit/$1');      // Edit artikel
    $routes->get('article/delete/(:any)', 'Article::delete/$1');  // Hapus artikel
});

// Halaman publik artikel
$routes->get('/article', 'Article::index');                        // List semua artikel untuk user
$routes->get('/article/(:segment)', 'Article::view/$1');          // Lihat detail artikel berdasarkan slug

// Halaman statis
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');

// Login user
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');

// ✅ Logout user
$routes->get('/user/logout', 'User::logout');
