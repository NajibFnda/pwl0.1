<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rute Halaman Utama (Cek Email & Statistik)
$routes->get('/', 'Home::index');
$routes->post('cek-email', 'Home::cekEmail');

// Rute Baru khusus Halaman Upgrade Pricing
$routes->get('upgrade', 'Home::upgrade');
