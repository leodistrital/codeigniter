<?php

namespace App\Models\api;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class EmpresasApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'empresas';
	protected $primaryKey = 'cod_emp';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_emp as id", "nom_emp", "dir_emp", "mai_emp", "cod_dep_emp", "cod_ciu_emp", "tel_emp", "web_emp", "cod_sec_emp", "obs_emp", "cod_pad_emp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
	// protected $afterInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];

	public function listatardatos($id = 0)
	{
		$array = ["cod_emp as id", "nom_emp", "dir_emp", "mai_emp", "cod_dep_emp", "cod_ciu_emp", "tel_emp", "web_emp", "cod_sec_emp", "obs_emp", "cod_pad_emp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		$data['sucursales'] = $this->buscarSucursales($id);
		// print_r($data);
		return $data;
	}


	public function buscarlistatardatos($request)
	{
		if (!empty($request->getVar("nombre")))
			$this->like('nom_emp', $request->getVar("nombre"), 'both');

		if (!empty($request->getVar("ciudad")))
			$this->where('cod_ciu_emp', $request->getVar("ciudad"));

		$array = ["cod_emp as id", "nom_emp", "dir_emp", "mai_emp", "cod_dep_emp", "cod_ciu_emp", "tel_emp", "web_emp", "cod_sec_emp", "obs_emp", "cod_pad_emp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

		$data = $this->select($array)->find();

		return $data;
		// echo $this->getLastQuery();
	}

	public function guardar($request)
	{


		$data = [
			'nom_emp' => $request->getVar('nom_emp'),
			'dir_emp' => $request->getVar('dir_emp'),
			'mai_emp' => $request->getVar('mai_emp'),
			'cod_dep_emp' => $request->getVar('cod_dep_emp'),
			'cod_ciu_emp' => $request->getVar('cod_ciu_emp'),
			'tel_emp' => $request->getVar('tel_emp'),
			'web_emp' => $request->getVar('web_emp'),
			'cod_sec_emp' => $request->getVar('cod_sec_emp'),
			'obs_emp' => $request->getVar('obs_emp'),
			'cod_pad_emp' => $request->getVar('cod_pad_emp'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];
		$id = $this->insert($data);
		$this->auditoria($request, $data, $id, 'crear');
		return $id;

	}




	public function auditoria(RequestInterface $request, $data, $id, $tipo)
	{
		$usuario = $request->getHeaderLine("Userapp");
		log_message('error', "tipo: " . $tipo . " - " . $this->table . ':{' . json_encode($data) . " } , id:{ " . $id . "}. usuario: {" . json_encode($usuario) . "}");
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_emp' => $id,
			'nom_emp' => $request->getVar('nom_emp'),
			'dir_emp' => $request->getVar('dir_emp'),
			'mai_emp' => $request->getVar('mai_emp'),
			'cod_dep_emp' => $request->getVar('cod_dep_emp'),
			'cod_ciu_emp' => $request->getVar('cod_ciu_emp'),
			'tel_emp' => $request->getVar('tel_emp'),
			'web_emp' => $request->getVar('web_emp'),
			'cod_sec_emp' => $request->getVar('cod_sec_emp'),
			'obs_emp' => $request->getVar('obs_emp'),
			'cod_pad_emp' => $request->getVar('cod_pad_emp'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];
		$confirmacion = $this->save($data);
		$this->auditoria($request, $data, $id, 'editar');

		if ($confirmacion == 1) {
			return $id;
		}
	}

	public function borrar($id)
	{

		$ok = $this->delete($id);
		$request = \Config\Services::request();
		$this->auditoria($request, '', $id, 'eliminar');
		return $ok;
	}

	// public function parametros()
	// {
	// 	$array = ["cod_emp as id", "nom_emp", "dir_emp", "mai_emp", "cod_dep_emp", "cod_ciu_emp", "tel_emp", "web_emp", "cod_sec_emp", "obs_emp", "cod_pad_emp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
	// 	$data = $this->select($array)->findAll();
	// 	return $data;
	// }

	public function buscarSucursales($id)
	{
		$array = ["cod_emp as id", "nom_emp", "dir_emp", "mai_emp", "cod_dep_emp", "cod_ciu_emp", "tel_emp", "web_emp", "cod_sec_emp", "obs_emp", "cod_pad_emp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->where('cod_pad_emp', $id)->find();
		return $data;

	}

	public function parametros()
	{
		$array = ["cod_emp as id", "nom_emp", "cod_pad_emp"];
		$data = $this->select($array)->orderBy('nom_emp')->findAll();
		return $data;
	}

}
/* fecha de creacion: 01-26-2024 02:03:09 pm */