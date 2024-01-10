<?php
namespace App\Controllers\web;
use App\Controllers\MyApiRest;
use App\Models\web\BannerWebModel;
use App\Models\web\CategoriasWebModel;
use App\Models\web\DiscursosWebModel;
use App\Models\web\Ganadores_historicoWebModel;
use App\Models\web\InvitadosWebModel;
use App\Models\web\JuradosWebModel;
use App\Models\web\Periodista_anoWebModel;
use App\Models\web\Simon_bolivarWebModel;
use App\Models\web\VidaobraWebModel;

class Home extends  MyApiRest
{
	protected $format    = 'json';

	public function index($edicion = 0)
	{
		//edicion actual ok
		$simonBolivar = new Simon_bolivarWebModel();
		['ano_sim' => $ano_sim ,'ver_sim' => $ver_sim, 'cod_sim' => $codigosim , 'pdf_act_sim' =>$pdfactajurado , 'pdf_dis_sim' =>$pdfdiscursojurado ] = $simonBolivar->edicionActual($edicion);

		//vida y obra
		$VidaobraModel= new VidaobraWebModel();
		$VidaobraData=$VidaobraModel->listatardatos($codigosim);

		//perdiodista del año
		$periodistaAno = new Periodista_anoWebModel();
		$periodistaAnoData = $periodistaAno->listatardatos($codigosim);

		//jurados
		$jurados = new JuradosWebModel();
		$juradosData =$jurados->listatardatos($codigosim);

		//categorias ganadores
		$CategoriasWebModel = new CategoriasWebModel();
		$categoriasData =$CategoriasWebModel->listatardatos($codigosim);
		$categoriasData= $this->divideCategorias($categoriasData);

		//invitado
		$InvitadosWebModel = new InvitadosWebModel();
		$invitadosData = $InvitadosWebModel->listatardatos($codigosim);

		//Discursos
		$DiscursosWebModel = new DiscursosWebModel();
		$discursosData = $DiscursosWebModel->listatardatos($codigosim);

		//videos
		$Ganadores_historicoWebModel = new Ganadores_historicoWebModel();
		$hanadores_historicoData = $Ganadores_historicoWebModel->listatardatos($codigosim);


		if ($ano_sim < 2012)
			return view('home-old', ['codigosim' =>$codigosim,
			'versionConsulta' =>$ver_sim ,'anionConsulta' =>$ano_sim, 'pdfactajurado'=>$pdfactajurado,
			'pdfdiscursojurado'=>$pdfdiscursojurado, 'vidaobra'=> $VidaobraData , 'periodistaAnoData'=>$periodistaAnoData,
			'juradosData'=>$juradosData, 'categoriasData' =>$categoriasData , 'invitadosData'=>$invitadosData,
			'discursosData'=>$discursosData,
			'videos' =>$hanadores_historicoData]);
		else
			return view('home', 
		[
			'codigosim' =>$codigosim,
			'versionConsulta' =>$ver_sim ,'anionConsulta' =>$ano_sim, 'pdfactajurado'=>$pdfactajurado, 'pdfdiscursojurado'=>$pdfdiscursojurado, 'vidaobra'=> $VidaobraData , 'periodistaAnoData'=>$periodistaAnoData, 'juradosData'=>$juradosData, 'categoriasData' =>$categoriasData , 'invitadosData'=>$invitadosData, 'discursosData'=>$discursosData,
		'videos' =>$hanadores_historicoData
	]);
	}

	public function vidaobra ($codigosim, $anionConsulta){
		//vida y obra
		$VidaobraModel= new VidaobraWebModel();
		$VidaobraData=$VidaobraModel->listatardatos($codigosim);
		return view('vidaobra', ['vidaobraData' => $VidaobraData, 'codigosim'=>$codigosim, 'anionConsulta'=>$anionConsulta]);
	}


		public function  jurado ($codigo){
		//vida y obra
		$jurados = new JuradosWebModel();
		$juradosData =$jurados->jurado($codigo);
		return view('jurado', ['juradosData' => $juradosData]);
	}

	public function getBanners()
	{
		$banners = new BannerWebModel();
		$array = ['img_ban as imagenban', 'lin_bam as link'];
		$data = $banners->select($array)->where('tip_ban', 1)->orderBy('ord_ban')->findAll();
		return view('components/home/1-banner', ['banners' => $data]);
	}

	public function divideCategorias($categorias) {
		$totalCol1= ceil( count($categorias)/3);
		$categoriasCol[0]=array_slice($categorias,0,$totalCol1);

		$categorias=array_splice($categorias, $totalCol1);
		$totalCol2= ceil( count($categorias)/2);
		$categoriasCol[1]=array_slice($categorias,0,$totalCol2);

		$categorias=array_splice($categorias, $totalCol2);

		$categoriasCol[2]=$categorias;

		 return $categoriasCol;
	}

}