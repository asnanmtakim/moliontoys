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
$routes->setDefaultController('Welcome');
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
$routes->set404Override(function ($message = null) {
    helper(['auth', 'app_helper']);
    if ($_SERVER['CI_ENVIRONMENT'] == 'production') {
        $message = 'Kemungkinan halaman telah dihapus, atau Anda salah menulis URL.';
    }
    return view('errors/error404', ['title' => 'Error 404', 'page' => 'error404', 'message' => $message]);
});

// Call All Routes
$db = \Config\Database::connect();
$builder = $db->table('app_routes');
$output = $builder->orderBy('route_order', 'ASC')->get()->getResultArray();
foreach ($output as $out) {
    if ($out['route_request'] == 'get') {
        if ($out['route_options'] == 0) {
            $routes->get($out['route_from'], $out['route_to']);
        } else {
            $optionKeys = explode(';', $out['route_option_keys']);
            $optionValues = explode(';', $out['route_option_values']);
            $options = array_combine($optionKeys, $optionValues);
            $routes->get($out['route_from'], $out['route_to'], $options);
        }
    }
    if ($out['route_request'] == 'post') {
        if ($out['route_options'] == 0) {
            $routes->post($out['route_from'], $out['route_to']);
        } else {
            $optionKeys = explode(';', $out['route_option_keys']);
            $optionValues = explode(';', $out['route_option_values']);
            $options = array_combine($optionKeys, $optionValues);
            $routes->post($out['route_from'], $out['route_to'], $options);
        }
    }
}

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
