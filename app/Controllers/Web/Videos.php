<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\Ganadores_historicoWebModel;
use App\Models\web\Simon_bolivarWebModel;

class Videos extends  MyApiRest
{
	protected $format    = 'json';

	public function index($anosim = 0)
	{
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim ,'ver_sim' => $ver_sim, 'cod_sim' => $codigosim , 'pdf_act_sim' =>$pdfactajurado , 'pdf_dis_sim' =>$pdfdiscursojurado ] = $simonBolivar->edicionActualAno($anosim);
		
		//videos
		$Ganadores_historicoWebModel = new Ganadores_historicoWebModel();
		$hanadores_historicoData = $Ganadores_historicoWebModel->listatardatostotal($codigosim);
		// echo $ver_sim."+++++++++";
		// return '';
		return view('videos', ['codigosim' =>$codigosim, 'versionConsulta' =>$ver_sim ,'anionConsulta' =>$ano_sim ,'videos' => $hanadores_historicoData]);
	}
}