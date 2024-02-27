<?php

namespace App\Models\api;

use CodeIgniter\Model;

class D_segmento_personaApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'd_segmento_persona';
	protected $primaryKey = 'cod_dse';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_dse as id", "cod_seg_dse", "cod_per_dse", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_dse as id", "cod_seg_dse", "cod_per_dse", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'cod_seg_dse' => $request->getVar('cod_seg_dse'),
			'cod_per_dse' => $request->getVar('cod_per_dse'),
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
			'cod_dse' => $id,
			'cod_seg_dse' => $request->getVar('cod_seg_dse'),
			'cod_per_dse' => $request->getVar('cod_per_dse'),
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


	public function edicionPersona($id, $request)
	{
		$this->where('cod_per_dse', $id)->delete();
		foreach ($request->getVar('segementos') as $clave) {
			$data = [
				'cod_seg_dse' => $clave->cod_seg_dse,
				'cod_per_dse' => $id,
			];
			$confirmacion = $this->save($data);
		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}

	public function parametros()
	{
		$array = ["cod_dse as id", "cod_seg_dse", "cod_per_dse", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}


	public function segementosPersona($id = 0)
	{
		$array = ["cod_dse as id", "cod_seg_dse", "cod_per_dse", "nom_seg"];
		$data = $this->select($array)->join('segmento', 'segmento.cod_seg=cod_seg_dse')->where('cod_per_dse', $id)->find();
		return $data;
	}
}
/* fecha de creacion: 02-14-2024 11:32:50 am */