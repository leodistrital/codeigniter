<?php

namespace App\Models\api;

use CodeIgniter\Model;

class D_evento_personaApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'd_evento_persona';
	protected $primaryKey = 'cod_devp';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_devp as id", "cod_eve_devp", "cod_per_devp", "pro_devp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_devp as id", "cod_eve_devp", "cod_per_devp", "pro_devp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'cod_eve_devp' => $request->getVar('cod_eve_devp'),
			'cod_per_devp' => $request->getVar('cod_per_devp'),
			'pro_devp' => $request->getVar('pro_devp'),
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
			'cod_devp' => $id,
			'cod_eve_devp' => $request->getVar('cod_eve_devp'),
			'cod_per_devp' => $request->getVar('cod_per_devp'),
			'pro_devp' => $request->getVar('pro_devp'),
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
		$array = ["cod_devp as id", "cod_eve_devp", "cod_per_devp", "pro_devp", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}


	public function edicionPersona($id, $request)
	{

		// echo $id;
		$this->where('cod_per_devp', $id)->delete();
		foreach ($request->getVar('eventos') as $clave) {
			// print_r($clave);
			$data = [
				'cod_eve_devp' => $clave->cod_eve_devp,
				'pro_devp' => $clave->pro_devp,
				'cod_per_devp' => $id,
			];
			$confirmacion = $this->save($data);
		}
	}


	public function eventosPersona($id = 0)
	{
		$array = ["cod_devp as id", "cod_eve_devp", "pro_devp"];
		$data = $this->select($array)->join('eventos', 'eventos.cod_eve=cod_eve_devp')->where('cod_per_devp', $id)->find();
		return $data;
	}
}
/* fecha de creacion: 02-16-2024 03:22:42 pm */