<?php

namespace App\Models\api;

use CodeIgniter\Model;

class EventosApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'eventos';
	protected $primaryKey = 'cod_eve';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_eve as id", "nom_eve", "tip_eve_eve", "pro_eve", "com_eve", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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


	public function buscarlistatardatos($request)
	{
		if (!empty($request->getVar("id")))
			$this->where('cod_eve', $request->getVar("id"));
		$array = ["cod_eve as id", "nom_eve", "tip_eve_eve", "pro_eve", "com_eve", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->find();
		return $data;
		// echo $this->getLastQuery();
	}

	public function listatardatos($id = 0)
	{
		$array = ["cod_eve as id", "nom_eve", "tip_eve_eve", "pro_eve", "com_eve", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'nom_eve' => $request->getVar('nom_eve'),
			'tip_eve_eve' => $request->getVar('tip_eve_eve'),
			'pro_eve' => $request->getVar('pro_eve'),
			'com_eve' => $request->getVar('com_eve'),
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
			'cod_eve' => $id,
			'nom_eve' => $request->getVar('nom_eve'),
			'tip_eve_eve' => $request->getVar('tip_eve_eve'),
			'pro_eve' => $request->getVar('pro_eve'),
			'com_eve' => $request->getVar('com_eve'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];

		// print_r($id);
		// print_r($data);
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
		$array = ["cod_eve as id", "nom_eve"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 02-05-2024 07:29:39 pm */