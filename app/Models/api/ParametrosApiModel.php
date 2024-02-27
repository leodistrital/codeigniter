<?php

namespace App\Models\api;

use CodeIgniter\Model;

class ParametrosApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'parametros';
	protected $primaryKey = 'cod_para';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_para as id", "nom_para", "val_op_para", "nom_op_para", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_para as id", "nom_para", "val_op_para", "nom_op_para", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function buscarlistatardatos($request)
	{
		$whereArray = ['cod_para' => $request->getVar("id"), 'nom_para' => 'titulo_persona'];
		if (!empty($request->getVar("id")))
			$this->where($whereArray);
		$array = ["cod_para as id", "nom_op_para", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->find();
		return $data;
		// echo $this->getLastQuery();
	}

	public function guardar($request)
	{
		$data = [
			'nom_para' => 'titulo_persona',
			'nom_op_para' => $request->getVar('nom_op_para'),
		];

		$id = $this->insert($data);

		$data = [
			'cod_para' => $id,
			'val_op_para' => $id,
		];
		$confirmacion = $this->save($data);

		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_para' => $id,
			'nom_op_para' => $request->getVar('nom_op_para'),
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
		$array = ["cod_para as id", "nom_para", "val_op_para", "nom_op_para", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}


	public function filtrodatos($filtro)
	{
		$array = ["val_op_para as id", "nom_op_para as name"];
		if (!empty($filtro)) {
			$data = $this->select($array)->where("nom_para", $filtro)->findAll();
			return $data;
		}
	}
}
/* fecha de creacion: 02-05-2024 06:47:08 pm */