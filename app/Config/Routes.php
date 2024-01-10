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


/** RUTAS PARA EL API */
$routes->group('api', ['namespace' => 'App\Controllers\API'], ['filter' => 'authFilter'], function ($routes) {

	// $routes->resource('admin_sitio'); 
	// $routes->resource('banner'); 

	// $routes->resource('aliados');
	// $routes->get('banners/grupo/(:num)', 'Banners::grupoBanner/$1');

	// $routes->resource('banners');
	// $routes->resource('categorias');
	// $routes->resource('cifras');
	// $routes->resource('contenidos');
	// $routes->resource('ediciones');
	// $routes->resource('equipos');
	// $routes->resource('faq');
	// $routes->resource('galeriaimagenes');
	// $routes->resource('galeriaimagenesdetalle');
	// $routes->resource('menuprincipal');

	// $routes->get('noticias/grupo/(:num)', 'Noticias::gruponoticias/$1');
	// $routes->resource('noticias');
	// $routes->resource('sedes');
	// $routes->resource('sitio');
	// $routes->resource('videohome');
	// $routes->resource('aliados');
	// $routes->resource('categoriasconvocatoria');
	// $routes->resource('comiteevaluador');
	// $routes->resource('proyectos');
	// $routes->resource('menueventos');
	// $routes->resource('agendaeventos');
	// $routes->resource('prensa');
	// $routes->get('speakerseventos/grupo/(:num)', 'Speakerseventos::grupospeakeers/$1');
	// $routes->resource('speakerseventos');
	// $routes->resource('regionesbam');
	// $routes->resource('label');
	// $routes->resource('participanbam');
	// $routes->resource('agendaeventosregiones');
	// // $routes->resource('acr_registo');
	// $routes->resource('Acr_registointerno');
	// $routes->resource('aliadosacreditacion');
	// $routes->resource('tarifasacreditacion');
	// $routes->resource('acr_registo');

	// // para todos las informes 
	// $routes->get('informes/(:any)', 'Informes::descargar/$1');


	// $routes->group('parametros', ['namespace' => 'App\Controllers\API'], function ($routes) {
	// 	$routes->get('tipoaliado', 'Aliados::parametros');
	// 	$routes->get('tipoacifras', 'Cifras::parametros');
	// 	$routes->get('ediciones', 'Ediciones::parametros');
	// 	$routes->get('categorias', 'Categorias::parametros');
	// 	$routes->get('menueventos', 'Menueventos::parametros');
	// 	$routes->get('galeriaimagenes', 'Galeriaimagenes::parametros');
	// 	$routes->get('agendaeventos', 'Agendaeventos::parametros');
	// 	$routes->get('galeriaimagenesdetalle/(:any)', 'Galeriaimagenesdetalle::parametros/$1');
	// 	$routes->get('regionesbam', 'Regionesbam::parametros');
	// 	$routes->get('agendaeventosregiones', 'Agendaeventosregiones::parametros');
	// 	$routes->get('tarifasacreditacion', 'Tarifasacreditacion::parametros');
	// 	$routes->get('categoriasconvocatoria', 'Categoriasconvocatoria::parametros');
	// 	$routes->get('acr_registo', 'Acr_registo::parametros');
	// 	//para la tabla parametros
	// 	$routes->get('parametros/(:any)', 'Parametros::filtro/$1');
	// });
});


/** rutas ajax */

// $routes->post('upload/(:any)', 'API\Archivos::upload/$1');
// $routes->post("login", "Login::index");
// $routes->post("verificar/(:any)", "Verificar::index/$1");

/** rutas ajax */

/** RUTAS PARA LA WEB */
/*** home */
$routes->get('/', 'Web\Home::index');
$routes->get('/vidaobra/(:num)/(:num)', 'Web\Home::vidaobra/$1/$2');
$routes->get('/jurado/(:num)', 'Web\Home::jurado/$1');
$routes->get('/(:num)', 'Web\Home::index/$1');
$routes->get('/videos/(:num)', 'Web\Videos::index/$1');
$routes->get('/ganadores/(:num)/(:any)', 'Web\Ganadores::index/$1/$2');
$routes->get('/elpremio/(:any)', 'Web\premio::premio/$1');
$routes->get('/faq/(:any)', 'Web\premio::faq/$1');
$routes->get('/contacto', 'Web\premio::contacto');
$routes->get('/galeria', 'Web\premio::galeria');






// rutas anteriores







// $routes->get('/pagostest', 'Web\Home::pagostest');
/** Menu 1 */
// $routes->get('/bam/(:any)', 'Web\Internas::contenidos/$1');
// /** Menu 2 */
// $routes->get('/convocatorias/(:any)', 'Web\Convocatorias::mostar/$1');
// /** Menu 3 */
// $routes->get('/seleccionados/(:any)/(:any)/', 'Web\Seleccionados::proyectos/$1/$2');
// /** Menu 4  programacion*/
// $routes->get('/programacion/(:any)/(:any)/', 'Web\Programacion::programacion/$1/$2');
// /** Menu 5  regiones */
// $routes->get('/regiones', 'Web\Regiones::contenidos');
// /** submenu  region */
// $routes->get('/region/(:any)', 'Web\Region::contenidos/$1');
// /** Menu 6  comunicados */
// $routes->get('/prensa', 'Web\Prensa::contenidos');
// /** Menu 6  historico */
// $routes->get('/ediciones', 'Web\Ediciones::contenidos');
// $routes->get('/ediciones/(:any)', 'Web\Ediciones::contenidos/$1');
// /** Menu 7  comunicados */
// $routes->get('/contacto', 'Web\Contacto::contenidos');
// //carga ventada flotante
// $routes->get('/seleccionado/resumen-persona/(:any)', 'Web\Seleccionados::resumenpersona/$1'); //carga ventada flotante
// $routes->get('/seleccionado/resumen-proyecto/(:any)', 'Web\Seleccionados::resumenproyecto/$1');
// $routes->get('/acreditaciones', 'Web\Acreditaciones::index');


// $routes->get('/infoacreditacion', 'Web\Registro::infoacreditacion');

/** Formulario de registro   */
// $routes->get('/registro', 'Web\Registro::index');
// $routes->post('/registro', 'Web\Registro::crearRegistro');
// $routes->post('/registro/login', 'Web\Registro::iniciosesion');
// $routes->get('/registro/salir', 'Web\Registro::cerrar');

// $routes->get('/registro/olvide', 'Web\Registro::olvide');
// $routes->post('/registro/olvide', 'Web\Registro::envioolvide');
// $routes->get('/registro/recuperar/(:any)', 'Web\Registro::recuperar/$1'); //fata
// $routes->post('/registro/recuperar', 'Web\Registro::cambiorecuperar/'); // falta


// $routes->get('/registro/activacion/(:any)', 'Web\Registro::activar/$1');
// $routes->post('/registro/activacion', 'Web\Registro::confirmar');
// $routes->post('/registro/envio', 'Web\Registro::testenvio');



// $routes->group('panel', ['filter' => 'Panelsesion'], static function ($routes) {
// 	$routes->get('', 'Web\Panel::index');
// 	$routes->get('pagos/(:any)/(:any)', 'Web\Panel::pagos/$1/$2');
// 	$routes->get('registro', 'Web\Panel::editarregistro');
// 	$routes->post('registro', 'Web\Registro::editaregistros');
// 	$routes->get('acreditacion/(:any)', 'Web\Panel::formacreditacion/$1');
// 	$routes->post('acreditacion/(:any)', 'Web\Panel::guardarformacreditacion/$1');
// 	$routes->get('descuento', 'Web\Panel::descuento');
// 	$routes->post('descuento', 'Web\Panel::aplicardescuento');
// 	$routes->get('guia/(:any)', 'Web\Guia::index/$1');
// 	$routes->post('guia/(:any)', 'Web\Guia::index/$1');
// 	$routes->get('vcard/(:any)/(:any)', 'Web\Guia::vcard/$1/$2');
// 	$routes->get('listafovortos/(:any)/(:any)', 'Web\Guia::listafavoritos/$1/$2');
// 	$routes->post('listafovortos', 'Web\Guia::guadarfavoritos');
// });

// $routes->get('/changelang', function () {
// 	helper('cookie', 'url');
// 	if (get_cookie('bamidioma') == "ENG") {
// 		$cookie = [
// 			'name' => 'bamidioma',
// 			'value' => 'ESP',
// 			'expire' => 3600 * 12, // Expire en 12 horas
// 		];
// 	}
// 	if (get_cookie('bamidioma') != "ENG") {
// 		$cookie = [
// 			'name' => 'bamidioma',
// 			'value' => 'ENG',
// 			'expire' => 3600 * 12, // Expire en 12 horas
// 		];
// 	}
// 	set_cookie($cookie);
// 	echo "<script>window.history.back();</script>";
// });

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
