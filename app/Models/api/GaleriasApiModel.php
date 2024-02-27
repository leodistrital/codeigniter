<?php

namespace App\Models\api;

use CodeIgniter\Model;

class GaleriasApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'galerias';
	protected $primaryKey = 'cod_gal';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_gal as id", "tip_gal", "nom_gal", "stit_gal", "ano_gal", "des_gal", "fec_crea", "fec_modif", "usu_acce", "reg_eli", 'act_gal'];

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
		$array = ["cod_gal as id", "tip_gal", "nom_gal", "stit_gal", "ano_gal", "des_gal", "fec_crea", "fec_modif", "usu_acce", "reg_eli", 'act_gal'];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('cod_gal', 'DESC')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'tip_gal' => $request->getVar('tip_gal'),
			'nom_gal' => $request->getVar('nom_gal'),
			'stit_gal' => $request->getVar('stit_gal'),
			'ano_gal' => $request->getVar('ano_gal'),
			'des_gal' => $request->getVar('des_gal'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli'),
			'act_gal' => $request->getVar('act_gal')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_gal' => $id,
			'tip_gal' => $request->getVar('tip_gal'),
			'nom_gal' => $request->getVar('nom_gal'),
			'stit_gal' => $request->getVar('stit_gal'),
			'ano_gal' => $request->getVar('ano_gal'),
			'des_gal' => $request->getVar('des_gal'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli'),
			'act_gal' => $request->getVar('act_gal')

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
		$array = ["cod_gal as value", "nom_gal as name"];
		$data = $this->select($array)->orderBy('cod_gal', 'desc')->findAll();
		return $data;
	}

	// public function parametros()
	// {
	// 	$array = ["cod_pre as value", "tit_pre as name"];
	// 	$data = $this->select($array)->where('pad_pre', 0)->orderBy('ord_pre', 'ASC')->findAll();
	// 	return $data;
	// }
}
/* fecha de creacion: 01-23-2024 10:36:12 am */