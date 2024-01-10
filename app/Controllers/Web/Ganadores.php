<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\CategoriasWebModel;
use App\Models\web\Ganadores_historicoWebModel;
use App\Models\web\Simon_bolivarWebModel;

class Ganadores extends MyApiRest
{
	protected $format = 'json';

	public function index($edicion = 0, $categoriaActiva = '')
	{
		//edicion actual ok
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim, 'ver_sim' => $ver_sim, 'cod_sim' => $codigosim ] = $simonBolivar->edicionActual($edicion);

		//categorias ganadores
		$CategoriasWebModel = new CategoriasWebModel();
		$categoriasData = $CategoriasWebModel->listatardatos($codigosim);
		['lista'=> $categoriasData , 'catActiva' =>$catActiva ] = $this->organizarcategorias($categoriasData ,$categoriaActiva);


		$Ganadores_historicoWebModel = new Ganadores_historicoWebModel();
		$hanadores_historicoData = $Ganadores_historicoWebModel->listatardatosGanadores($codigosim, $catActiva['cod_cat']);

		// echo $catActiva['cod_cat'];
		// var_dump($hanadores_historicoData);
		// return '';
		return view(
			'ganadores',
			[
				'codigosim' => $codigosim,
				'versionConsulta' => $ver_sim, 'anionConsulta' => $ano_sim,  'categoriasData' => $categoriasData, 'catActiva' =>$catActiva , 'hanadores_historicoData' =>$hanadores_historicoData
			]
		);
	}


	public function organizarcategorias($categorias, $categoriaActiva) {
		
		foreach ($categorias as $key => $categoria) {
			if ($categoria['slu_cat'] == $categoriaActiva) {
				$categorias[$key]['active'] = true;
				$catActiva=$categoria;
			} else {
				$categorias[$key]['active'] = false;
			}
		}
		
		$catResultado['lista'] = $categorias;
		$catResultado['catActiva'] = $catActiva;
		return $catResultado;
	}
}