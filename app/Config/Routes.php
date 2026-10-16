<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');

// Redirect root to login
$routes->get('/', function () {
    return redirect()->to('/login');
});

// Admin Dashboard
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    // Profile Suco
    $routes->match(['get', 'post'], 'profile-suco', 'ProfileSuco::index');

    // Aldeia
    $routes->get('aldeias', 'Aldeia::index');
    $routes->get('aldeias/create', 'Aldeia::create');
    $routes->post('aldeias/store', 'Aldeia::store');
    $routes->get('aldeias/edit/(:num)', 'Aldeia::edit/$1');
    $routes->post('aldeias/update/(:num)', 'Aldeia::update/$1');
    $routes->get('aldeias/delete/(:num)', 'Aldeia::delete/$1');

    // Family Cards
    $routes->get('family-cards', 'FamilyCard::index');
    $routes->get('family-cards/create', 'FamilyCard::create');
    $routes->post('family-cards/store', 'FamilyCard::store');
    $routes->get('family-cards/edit/(:num)', 'FamilyCard::edit/$1');
    $routes->post('family-cards/update/(:num)', 'FamilyCard::update/$1');
    $routes->get('family-cards/delete/(:num)', 'FamilyCard::delete/$1');
    $routes->get('family-cards/print/(:num)', 'FamilyCard::print/$1');

    // Citizens
    $routes->get('citizens', 'Citizen::index');
    $routes->get('citizens/create', 'Citizen::create');
    $routes->post('citizens/store', 'Citizen::store');
    $routes->get('citizens/edit/(:num)', 'Citizen::edit/$1');
    $routes->post('citizens/update/(:num)', 'Citizen::update/$1');
    $routes->get('citizens/delete/(:num)', 'Citizen::delete/$1');
    $routes->get('citizens/print/(:num)', 'Citizen::print/$1');
    $routes->get('citizens/detail/(:num)', 'Citizen::detail/$1');

    // Search
    $routes->get('search', 'Search::index');

    // Settings
    $routes->match(['get', 'post'], 'settings/profile', 'Setting::profile');
    $routes->match(['get', 'post'], 'settings/system', 'Setting::system');
    $routes->match(['get', 'post'], 'settings/backup', 'Setting::backup');
    $routes->get('settings/backup/do', 'Setting::doBackup');
    $routes->get('settings/backup/download/(:any)', 'Setting::downloadBackup/$1');
    $routes->post('settings/backup/restore', 'Setting::restore');

});
