<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\CategoriasWebModel;
use App\Models\web\Ganadores_historicoWebModel;
use App\Models\web\ImagenesWebModel;
use App\Models\web\InternasWebModel;
use App\Models\web\Preguntas_frecuentesWebModel;
use App\Models\web\Simon_bolivarWebModel;

class Premio extends MyApiRest
{
	protected $format = 'json';

	public function premio($slug)
	{
		$interna = 1;
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim, 'ver_sim' => $ver_sim, 'cod_sim' => $codigosim] = $simonBolivar->edicionActual(0);
		// echo $slug;
		$InternasWebModel = new InternasWebModel();
		$dataInternas = $InternasWebModel->listatardatos();
		$internaActiva = $InternasWebModel->listatardatosSlug($slug);
		return view('premio', [
			'interna' => $interna,
			'codigosim' => $codigosim,
			'versionConsulta' => $ver_sim,
			'anionConsulta' => $ano_sim,
			'dataInternas' => $dataInternas,
			'internaActiva' => $internaActiva[0]
		]);
	}

	public function faq($slug)
	{
		$interna = 2;
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim, 'ver_sim' => $ver_sim, 'cod_sim' => $codigosim] = $simonBolivar->edicionActual(0);
		// echo $slug;
		$InternasWebModel = new Preguntas_frecuentesWebModel();
		$menupreguntas = $InternasWebModel->listatarmenu();
		// $internaActivaFaq = $InternasWebModel->listatardatosSlug($slug);
		['respuestasfaq' => $respuestasfaq, 'interactuva' => $interactuva] = $InternasWebModel->listatardatosSlug($slug);
		//  var_dump($interactuva);
		//  return '';
		return view('premio', [
			'interna' => $interna,
			'codigosim' => $codigosim,
			'versionConsulta' => $ver_sim,
			'anionConsulta' => $ano_sim,
			'menupreguntas' => $menupreguntas,
			'interactuva' => $interactuva,
			'respuestasfaq' => $respuestasfaq
		]);
	}


	public function contacto()
	{
		$interna = 3;
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim, 'ver_sim' => $ver_sim, 'cod_sim' => $codigosim] = $simonBolivar->edicionActual(0);

		return view('premio', [
			'interna' => $interna,
			'codigosim' => $codigosim,
			'versionConsulta' => $ver_sim,
			'anionConsulta' => $ano_sim
		]);
	}

	public function galeria()
	{
		$interna = 4;
		$simonBolivar = new Simon_bolivarWebModel();
		$imagenesModel = new ImagenesWebModel();
		['ano_sim' => $ano_sim, 'ver_sim' => $ver_sim, 'cod_sim' => $codigosim] = $simonBolivar->edicionActual(0);


		$array = ["ano_sim", "dir_ima", 'cod_gal_sim'];
		$data = $simonBolivar->select($array)->join('galerias', 'cod_gal=cod_gal_sim')->join('imagenes', 'cod_gal_ima=cod_gal_sim')->where('act_gal', 1)->groupBy('ano_sim')->orderBy('ano_sim', 'DESC')->find();
		// $data = $simonBolivar->select($array)->join('imagenes', 'cod_gal_ima=cod_gal_sim')->where('act_gal', 1)->groupBy('ano_sim')->orderBy('ano_sim', 'DESC')->find();


		foreach ($data as $item) {
			$item['galeria'] = $this->getImages($item['cod_gal_sim']);
			$ediciones[] = $item;
		}

		// var_dump($ediciones);

		// return '';

		return view('premio', [
			'interna' => $interna,
			'codigosim' => $codigosim,
			'versionConsulta' => $ver_sim,
			'anionConsulta' => $ano_sim,
			'ediciones' => $ediciones
		]);
	}

	public function getImages($id)
	{
		$imagenesModel = new ImagenesWebModel();
		$imagenes = $imagenesModel->listatardatos($id);
		return $imagenes;
	}

}
























