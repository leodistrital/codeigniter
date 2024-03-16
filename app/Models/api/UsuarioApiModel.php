<?php

namespace App\Models\api;

use CodeIgniter\Model;

class UsuarioApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'usuario';
	protected $primaryKey = 'cod_usu';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_usu as id", "nom_usu", "nombre_usu", "car_usu", "cc_usu", "tel_usu", "dir_usu", "log_usu", "pas_usu", "pas_usu2", "ciu_usu", "codig_usu", "cel_usu", "cod_per_usu", "susu", "spas", "fec_crea", "fec_modif", "usu_acce", "reg_eli", 'token_usu'];

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
		$array = ["cod_usu as id", "nom_usu", "nombre_usu", "car_usu", "cc_usu", "tel_usu", "dir_usu", "log_usu", "pas_usu", "pas_usu2", "ciu_usu", "codig_usu", "cel_usu", "cod_per_usu", "susu", "spas", "fec_crea", "fec_modif", "usu_acce", "reg_eli", 'token_usu'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_usu' => $request->getVar('nom_usu'),
			'nombre_usu' => $request->getVar('nombre_usu'),
			'car_usu' => $request->getVar('car_usu'),
			'cc_usu' => $request->getVar('cc_usu'),
			'tel_usu' => $request->getVar('tel_usu'),
			'dir_usu' => $request->getVar('dir_usu'),
			'log_usu' => $request->getVar('log_usu'),
			'pas_usu' => $request->getVar('pas_usu'),
			'pas_usu2' => $request->getVar('pas_usu2'),
			'ciu_usu' => $request->getVar('ciu_usu'),
			'codig_usu' => $request->getVar('codig_usu'),
			'cel_usu' => $request->getVar('cel_usu'),
			'cod_per_usu' => $request->getVar('cod_per_usu'),
			'susu' => $request->getVar('susu'),
			'spas' => $request->getVar('spas'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_usu' => $id,
			'nom_usu' => $request->getVar('nom_usu'),
			'nombre_usu' => $request->getVar('nombre_usu'),
			'car_usu' => $request->getVar('car_usu'),
			'cc_usu' => $request->getVar('cc_usu'),
			'tel_usu' => $request->getVar('tel_usu'),
			'dir_usu' => $request->getVar('dir_usu'),
			'log_usu' => $request->getVar('log_usu'),
			'pas_usu' => $request->getVar('pas_usu'),
			'pas_usu2' => $request->getVar('pas_usu2'),
			'ciu_usu' => $request->getVar('ciu_usu'),
			'codig_usu' => $request->getVar('codig_usu'),
			'cel_usu' => $request->getVar('cel_usu'),
			'cod_per_usu' => $request->getVar('cod_per_usu'),
			'susu' => $request->getVar('susu'),
			'spas' => $request->getVar('spas'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];
		$confirmacion = $this->save($data);

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
		$array = ["cod_usu as id", "nom_usu", "nombre_usu", "car_usu", "cc_usu", "tel_usu", "dir_usu", "log_usu", "pas_usu", "pas_usu2", "ciu_usu", "codig_usu", "cel_usu", "cod_per_usu", "susu", "spas", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 02-26-2024 10:29:38 am */