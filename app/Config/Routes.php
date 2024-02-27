<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Start::index');
$routes->post('/submit', 'Start::create');
$routes->get('/login', 'Staff::index');
$routes->get('/login2', 'Staff::index2');
$routes->post('/login', 'Staff::login');
$routes->get('/menu', 'Staff::menu');
$routes->get('/iplist', 'Ipaddress::index');
$routes->post('/oldip', 'Ipaddress::oldip');
$routes->post('/newip', 'Ipaddress::newip');
$routes->get('/ipaddress', 'ipaddress::update');
$routes->get('/report', 'Report::menu');
$routes->get('/report/annual/', 'Report::annual');
$routes->get('/report/stats/', 'Report::stats');
$routes->get('/list', 'Report::listreport');

$routes->get('/profile/', 'Staff::profile');
$routes->get('/create', 'Staff::create');
$routes->post('/createprofile', 'Staff::createprofile');
$routes->get('/trimddms', 'Report::trimddms');

$routes->get('/task', 'Staff::task/1');
$routes->get('/completedtask', 'Staff::task/2');
$routes->get('/tasklist', 'Staff::tasklist');
$routes->post('/addtask', 'Staff::addtask');
$routes->post('/updatetask', 'Staff::updatetask');

$routes->get('/fail', 'Home::fail');
$routes->get('/logout', 'Start::logout');
$routes->get('/viewreport', 'Report::viewreport');
$routes->get('/updatereport', 'Report::updatereport');
$routes->post('/updatereport', 'Report::updatereport');

$routes->get('/print', 'pdfgen::print');
$routes->get('/chart', 'Report::chart');
$routes->get('/rest', 'Staff::reset');
$routes->get('/laporan', 'Report::lapdir');
$routes->post('/reset', 'Staff::resetpassword');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
