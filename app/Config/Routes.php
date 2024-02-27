<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}
/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

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
// $routes->get('/', 'Home::index');

/** RUTAS PARA EL GENERADOR DE CODIGO */
$routes->get('/dev/generador', 'dev::generador');
$routes->get('/dev/generador/(:any)', 'dev::operaciones/$1');
$routes->get('/dev/modelo/(:any)', 'dev::crearModelo/$1');
$routes->get('/dev/modeloweb/(:any)', 'dev::crearModeloweb/$1');
$routes->get('/dev/controlador/(:any)', 'dev::crearControlador/$1');
$routes->get('/dev/controladorweb/(:any)', 'dev::crearControladorweb/$1');


/** rutas ajax */
$routes->post("login", "Login::index");
$routes->post('upload/(:any)', 'API\Archivos::upload/$1');
// $routes->get('upload/(:any)', 'API\Archivos::upload/$1');
$routes->post("verificar/(:any)", "Verificar::index/$1");

/** rutas ajax */





/** RUTAS PARA EL API */
$routes->group('api', ['namespace' => 'App\Controllers\API'], ['filter' => 'authFilter'], function ($routes) {

	$routes->get('test', function () {
		return phpinfo();
	});
	$routes->resource('empresas');
	$routes->resource('departamentos');
	$routes->resource('sector');
	$routes->resource('segmento');
	$routes->resource('personas');
	$routes->resource('eventos');
	$routes->resource('d_segmento_persona');
	$routes->resource('d_evento_persona');
	$routes->resource('parametrostabla');
	$routes->post('reportes', 'personas::reporte');
	$routes->get('asistentesdireccion/(:any)', 'personas::asistentesdireccion/$1');


	// para todos las informes 
	$routes->get('informes/(:any)', 'Informes::descargar/$1');


	$routes->group('parametros', ['namespace' => 'App\Controllers\API'], function ($routes) {
		$routes->get('ciudades', 'ciudades::parametros');
		$routes->get('departamentos', 'departamentos::parametros');
		$routes->get('empresas', 'empresas::parametros');
		$routes->get('sector', 'sector::parametros');
		$routes->get('segmento', 'segmento::parametros');
		$routes->get('eventos', 'eventos::parametros');
		$routes->get('titulos', 'eventos::titulos');

		$routes->get('parametros/(:any)', 'Parametros::filtro/$1');
	});
});



/** RUTAS PARA LA WEB */
/*** home */
// $routes->get('/', 'Web\Home::index');
// $routes->get('/vidaobra/(:num)/(:num)', 'Web\Home::vidaobra/$1/$2');
// $routes->get('/jurado/(:num)', 'Web\Home::jurado/$1');
// $routes->get('/(:num)', 'Web\Home::index/$1');
// $routes->get('/videos/(:num)', 'Web\Videos::index/$1');
// $routes->get('/ganadores/(:num)/(:any)', 'Web\Ganadores::index/$1/$2');
// $routes->get('/elpremio/(:any)', 'Web\premio::premio/$1');
// $routes->get('/faq/(:any)', 'Web\premio::faq/$1');
// $routes->get('/contacto', 'Web\premio::contacto');
// $routes->get('/galeria', 'Web\premio::galeria');




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
