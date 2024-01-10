<?php
namespace App\Libraries;

use App\Models\web\AnniosPSBWebModel;
use App\Models\web\AnniosSedWebModel;
use App\Models\web\SitioWebModel;


class ViewSitio
{

    public function getKeyWords()
    {
        $sitio = new SitioWebModel();
        $array = ['key_sit'];
        $data = $sitio->select($array)->findAll();
        return view('components/cabezote/keywords', ['keywords' => $data[0]['key_sit']]);
    }


    public function getRedes()
    {
        $sitio = new SitioWebModel();
        $array = ['fac_sit as facebook', 'twt_sit as twitter', 'ins_sit as instagram', 'you_sit as youtube' , 'mai_sit as email'];
        $data = $sitio->select($array)->findAll();
        return view('components/cabezote/social-networks', ['redes' => $data[0]]);
    }


    public function getAnallitycs()
    {
        $sitio = new SitioWebModel();
        $array = ['ana_sit'];
        $data = $sitio->select($array)->findAll();
        return $data[0]['ana_sit'];
    }

    public function getListaEdiciones($versionConsulta=0, $anionConsulta=0)
	{
		
		// return 'xxxxxxxxxxxx';
		$aniionsPSB  = new AnniosPSBWebModel();
		$grupoItem = new AnniosSedWebModel();
		$aniosIndividual = $aniionsPSB->listaindividual();
		$aniosGrupo = $aniionsPSB->listaGrupo();
		$grupoItemLista = $grupoItem->listatardatos();

		$index=0;
		foreach ($aniosGrupo as $row) {
			$orden = $row['cod_ap'];
			$submenuAnios = array_filter($grupoItemLista, fn ($list) => $list['cod_anio_asd'] == $orden);
			$aniosGrupo[$index]['submenus']= $submenuAnios;
			$index++;
		}

		return view('components/home/listaEdiciones', ['listaindividual' => $aniosIndividual, 'listaGrupo' => $aniosGrupo, 'grupoItemLista' => $grupoItemLista,'versionConsulta'=> $versionConsulta,'anionConsulta'=> $anionConsulta]);
	}

}