<?php

namespace App\Models\api;

use CodeIgniter\Model;

class PersonasApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'personas';
	protected $primaryKey = 'cod_per';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_per as id", "cod_tit_per", "nom_per", "ape_per", "cod_gen_per", "pro_per", "cod_civ_per", "mai_per", "coy_per", "cod_emp_per", "dsc_per", "car_per", "tof_per", "obs_per", "twt_per", "cel_per", "cod_dep_per", "cod_cui_per", "dir_per", "sec_per", "temp_per", "codigo_temporal", "dir_corr_per", "tipo_dir_per", "cod_dir_per", "cod_suc_per", "asis_per", "est_coy_per", "reg_per", "hab_per", "sin_dirc_per", "wha_per", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Validation
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];

	public function listatardatos($id = 0)
	{
		$array = ["cod_per as id", "cod_tit_per", "nom_per", "ape_per", "cod_gen_per", "pro_per", "cod_civ_per", "mai_per", "coy_per", "cod_emp_per", "dsc_per", "car_per", "tof_per", "obs_per", "twt_per", "cel_per", "cod_dep_per", "cod_cui_per", "dir_per", "sec_per", "temp_per", "codigo_temporal", "dir_corr_per", "tipo_dir_per", "cod_dir_per", "cod_suc_per", "asis_per", "est_coy_per", "reg_per", "hab_per", "sin_dirc_per", "wha_per", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
			$data['conyugue'] = $this->buscarconyugue($id);
			$data['asistentes'] = $this->buscarAsistentes($id);
		}

		return $data;
	}

	public function buscarlistatardatos($request)
	{
		if (!empty($request->getVar("nombre")))
			$this->like('nom_per', $request->getVar("nombre"), 'both');

		if (!empty($request->getVar("apellido")))
			$this->like('ape_per', $request->getVar("apellido"), 'both');

		if (!empty($request->getVar("correo")))
			$this->like('mai_per', $request->getVar("correo"), 'both');


		if (!empty($request->getVar("sector")))
			$this->where('sec_per', $request->getVar("sector"));

		if (!empty($request->getVar("empresa")))
			$this->where('d_empresa_persona.cod_emp', $request->getVar("empresa"));


		$this->join('d_empresa_persona', 'd_empresa_persona.cod_per_dpe = personas.cod_per', 'left');
		$this->join('empresas', 'empresas.cod_emp = d_empresa_persona.cod_emp', 'left');


		$this->join('sector', 'sector.cod_sec = personas.sec_per', 'left');
		$this->join('ciudades', 'ciudades.cod_mun = personas.cod_cui_per', 'left');
		$this->groupBy('cod_per');



		$array = ["cod_per as id", "cod_tit_per", "nom_per", "ape_per", "cod_gen_per", "pro_per", "cod_civ_per", "mai_per", "coy_per", "cod_emp_per", "dsc_per", "car_per", "tof_per", "obs_per", "twt_per", "cel_per", "cod_dep_per", "cod_cui_per", "dir_per", "sec_per", "temp_per", "codigo_temporal", "dir_corr_per", "tipo_dir_per", "cod_dir_per", "cod_suc_per", "asis_per", "est_coy_per", "reg_per", "hab_per", "sin_dirc_per", "wha_per", 'nom_emp', 'nom_sec', 'nom_mun'];

		$data = $this->select($array)->find();

		return $data;
		// echo $this->getLastQuery();
	}

	public function guardar($request)
	{

		$data = [
			'cod_tit_per' => $request->getVar('cod_tit_per'),
			'nom_per' => $request->getVar('nom_per'),
			'ape_per' => $request->getVar('ape_per'),
			'cod_gen_per' => $request->getVar('cod_gen_per'),
			'pro_per' => $request->getVar('pro_per'),
			'cod_civ_per' => $request->getVar('cod_civ_per'),
			'mai_per' => $request->getVar('mai_per'),
			'coy_per' => $request->getVar('coy_per'),
			'cod_emp_per' => $request->getVar('cod_emp_per'),
			'dsc_per' => $request->getVar('dsc_per'),
			'car_per' => $request->getVar('car_per'),
			'tof_per' => $request->getVar('tof_per'),
			'obs_per' => $request->getVar('obs_per'),
			'twt_per' => $request->getVar('twt_per'),
			'cel_per' => $request->getVar('cel_per'),
			'cod_dep_per' => $request->getVar('cod_dep_per'),
			'cod_cui_per' => $request->getVar('cod_cui_per'),
			'dir_per' => $request->getVar('dir_per'),
			'sec_per' => $request->getVar('sec_per'),
			'temp_per' => $request->getVar('temp_per'),
			'codigo_temporal' => $request->getVar('codigo_temporal'),
			'dir_corr_per' => $request->getVar('dir_corr_per'),
			'tipo_dir_per' => $request->getVar('tipo_dir_per'),
			'cod_dir_per' => $request->getVar('cod_dir_per'),
			'cod_suc_per' => $request->getVar('cod_suc_per'),
			'asis_per' => $request->getVar('asis_per'),
			'est_coy_per' => $request->getVar('est_coy_per'),
			'reg_per' => $request->getVar('reg_per'),
			'hab_per' => $request->getVar('hab_per'),
			'sin_dirc_per' => $request->getVar('sin_dirc_per'),
			'wha_per' => $request->getVar('wha_per'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];

		$id = $this->insert($data);
		$this->GuardarSegmentos($id, $request);
		$this->GuardarEventos($id, $request);
		$this->GuardarEmpresas($id, $request);

		return $id;
		// return 1;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_per' => $id,
			'cod_tit_per' => $request->getVar('cod_tit_per'),
			'nom_per' => $request->getVar('nom_per'),
			'ape_per' => $request->getVar('ape_per'),
			'cod_gen_per' => $request->getVar('cod_gen_per'),
			'pro_per' => $request->getVar('pro_per'),
			'cod_civ_per' => $request->getVar('cod_civ_per'),
			'mai_per' => $request->getVar('mai_per'),
			'coy_per' => $request->getVar('coy_per'),
			'cod_emp_per' => $request->getVar('cod_emp_per'),
			'dsc_per' => $request->getVar('dsc_per'),
			'car_per' => $request->getVar('car_per'),
			'tof_per' => $request->getVar('tof_per'),
			'obs_per' => $request->getVar('obs_per'),
			'twt_per' => $request->getVar('twt_per'),
			'cel_per' => $request->getVar('cel_per'),
			'cod_dep_per' => $request->getVar('cod_dep_per'),
			'cod_cui_per' => $request->getVar('cod_cui_per'),
			'dir_per' => $request->getVar('dir_per'),
			'sec_per' => $request->getVar('sec_per'),
			'temp_per' => $request->getVar('temp_per'),
			'codigo_temporal' => $request->getVar('codigo_temporal'),
			'dir_corr_per' => $request->getVar('dir_corr_per'),
			'tipo_dir_per' => $request->getVar('tipo_dir_per'),
			'cod_dir_per' => $request->getVar('cod_dir_per'),
			'cod_suc_per' => $request->getVar('cod_suc_per'),
			'asis_per' => $request->getVar('asis_per'),
			'est_coy_per' => $request->getVar('est_coy_per'),
			'reg_per' => $request->getVar('reg_per'),
			'hab_per' => $request->getVar('hab_per'),
			'sin_dirc_per' => $request->getVar('sin_dirc_per'),
			'wha_per' => $request->getVar('wha_per'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];


		$confirmacion = $this->save($data);

		$this->GuardarSegmentos($id, $request);
		$this->GuardarEventos($id, $request);
		$this->GuardarEmpresas($id, $request);


		if ($confirmacion == 1) {
			return $id;
		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}

	public function parametros()
	{
		$array = ["cod_per as id", "cod_tit_per", "nom_per", "ape_per", "cod_gen_per", "pro_per", "cod_civ_per", "mai_per", "coy_per", "cod_emp_per", "dsc_per", "car_per", "tof_per", "obs_per", "twt_per", "cel_per", "cod_dep_per", "cod_cui_per", "dir_per", "sec_per", "temp_per", "codigo_temporal", "dir_corr_per", "tipo_dir_per", "cod_dir_per", "cod_suc_per", "asis_per", "est_coy_per", "reg_per", "hab_per", "sin_dirc_per", "wha_per", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function buscarconyugue($id = 0)
	{
		$array = ["cod_per as id"];
		$data = $this->select($array)->where('coy_per', $id)->find();
		if (!empty($data[0]['id']))
			return $data[0]['id'];
		return 0;
	}


	public function buscarAsistentes($id = 0)
	{
		$array = ["cod_per as id ", "nom_per", "ape_per"];
		$wherearray = ["coy_per" => $id, 'asis_per' => 1];
		$data = $this->select($array)->where($wherearray)->find();
		return $data;
	}


	public function GuardarSegmentos($id, $request)
	{
		if (!empty($request->getVar('segementos'))) {
			$segementos = new D_segmento_personaApiModel();
			$segementos->edicionPersona($id, $request);
		}
	}

	public function GuardarEventos($id, $request)
	{
		if (!empty($request->getVar('eventos'))) {
			$modelo = new D_evento_personaApiModel();
			$modelo->edicionPersona($id, $request);
		}
	}


	public function GuardarEmpresas($id, $request)
	{
		// echo $id;
		if (!empty($request->getVar('empresas'))) {
			$modelo = new D_empresa_personaApiModel();
			$modelo->edicionPersona($id, $request);
		}
	}
	public function direcciones($id)
	{
		// echo $id;
		$listadirecciones = [];
		$modelo = new D_empresa_personaApiModel();
		$dataempesas = $modelo->empresasPersona($id);

		$array = ["dir_per as direccion", " concat('Direccion residencia',' - ', dir_per) as lugar",];
		$dirpersona = $this->select($array)->find($id);
		foreach ($dataempesas as $dir) {
			$listadirecciones[] = array("lugar" => $dir["nom_emp"] . " - " . $dir['dir_dpe'], "direccion" => $dir['dir_dpe']);
		}

		$listadirecciones[] = $dirpersona;

		// print_r($listadirecciones);
		return $listadirecciones;

	}

	public function reporte($request)
	{
		$data = [];

		$array = ["(select nom_op_para from parametros where val_op_para = cod_tit_per and nom_para='titulo_persona' limit 1) as Titulo", "nom_eve as Evento", 'nom_sec as sector', 'nom_seg as segmento', "nom_per as nombres", "ape_per as apellidos", "mai_per as correo", "cel_per as celular", "wha_per as whatsapp", "pro_per as profesion", "tof_per as fijo", "dir_per as direccion residencia", "dir_per as direccion correspondencia", "nom_dep as departamento", "nom_mun as ciudad", "nom_emp as empresa", "car_dpe as cargo", "mail_dpe as correo ", "tel_dpe as telefono", "obs_per as observaciones", "hab_per as habeas"];


		$this->select($array);



		if (!empty($request->getVar('eventos'))) {
			$data = [];
			foreach ($request->getVar('eventos') as $clave) {
				array_push($data, $clave->cod_eve);
			}

			$this->whereIn('cod_eve_devp', $data);
		}

		if (!empty($request->getVar('sectores'))) {
			$data = [];
			foreach ($request->getVar('sectores') as $clave) {
				array_push($data, $clave->cod_sec);
			}

			$this->whereIn('sec_per', $data);
		}

		if (!empty($request->getVar('segmentos'))) {
			$data = [];
			foreach ($request->getVar('segmentos') as $clave) {
				array_push($data, $clave->cod_seg);
			}

			$this->whereIn('cod_seg_dse', $data);
		}

		$this->join('d_evento_persona', 'd_evento_persona.cod_per_devp = cod_per', 'left');
		$this->join('eventos', 'eventos.cod_eve = d_evento_persona.cod_eve_devp', 'left');
		$this->join('sector', 'sector.cod_sec = sec_per', 'left');
		$this->join('d_segmento_persona', 'd_segmento_persona.cod_per_dse = cod_per', 'left');
		$this->join('segmento', 'segmento.cod_seg = d_segmento_persona.cod_seg_dse', 'left');


		$this->join('parametros', 'parametros.cod_para = cod_tit_per', 'left');
		$this->join('departamentos', 'departamentos.cod_dep = cod_dep_per', 'left');
		$this->join('ciudades', 'ciudades.cod_mun = cod_cui_per', 'left');

		$this->join('d_empresa_persona', 'd_empresa_persona.cod_per_dpe = cod_per', 'left');
		$this->join('empresas', 'empresas.cod_emp = d_empresa_persona.cod_emp', 'left');



		$this->groupBy(['cod_per', 'cod_eve_devp', 'cod_sec', 'cod_seg']);
		$this->orderBy('nom_per , ape_per');
		$this->limit(50000);
		$data = $this->find();
		// print_r($data);
		return $data;

		// $data = $this->select($array)->find();
		// echo $this->getCompiledSelect();
		// echo $this->getLastQuery();



	}
}
/* fecha de creacion: 02-05-2024 04:25:07 pm */
