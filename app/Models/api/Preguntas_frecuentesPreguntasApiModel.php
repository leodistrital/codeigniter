<?php

namespace App\Models\api;

use CodeIgniter\Model;

class Preguntas_frecuentesPreguntasApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'preguntas_frecuentes';
	protected $primaryKey = 'cod_pre';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_pre as id", "tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_pre as id", "tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli", "(select tit_pre from preguntas_frecuentes as u where u.cod_pre=preguntas_frecuentes.pad_pre ) as tema "];
		if ($id == 0) {
			$data = $this->select($array)->where('pad_pre!=', 0)->orderBy('pad_pre ASC')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		// echo $this->getLastQuery();
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'tit_pre' => $request->getVar('tit_pre'),
			'res_pre' => $request->getVar('res_pre'),
			'ord_pre' => $request->getVar('ord_pre'),
			'pad_pre' => $request->getVar('pad_pre'),
			'pad_men' => $request->getVar('pad_men'),
			'slu_pre' => $request->getVar('slu_pre'),
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
			'cod_pre' => $id,
			'tit_pre' => $request->getVar('tit_pre'),
			'res_pre' => $request->getVar('res_pre'),
			'ord_pre' => $request->getVar('ord_pre'),
			'pad_pre' => $request->getVar('pad_pre'),
			'pad_men' => $request->getVar('pad_men'),
			'slu_pre' => $request->getVar('slu_pre'),
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
		$array = ["cod_pre as value", "tit_pre as name"];
		$data = $this->select($array)->where('pad_pre', 0)->orderBy('ord_pre', 'ASC')->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-22-2024 07:28:31 pm */