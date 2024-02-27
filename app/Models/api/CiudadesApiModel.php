<?php
namespace App\Models\api;

use CodeIgniter\Model;

class CiudadesApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'ciudades';
	protected $primaryKey = 'cod_mun';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_mun as id", "cod_int_mun", "nom_mun", "cod_dep_mun", "des_mun", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_mun as id", "cod_int_mun", "nom_mun", "cod_dep_mun", "des_mun", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'cod_int_mun' => $request->getVar('cod_int_mun')
			,
			'nom_mun' => $request->getVar('nom_mun')
			,
			'cod_dep_mun' => $request->getVar('cod_dep_mun')
			,
			'des_mun' => $request->getVar('des_mun')
			,
			'fec_crea' => $request->getVar('fec_crea')
			,
			'fec_modif' => $request->getVar('fec_modif')
			,
			'usu_acce' => $request->getVar('usu_acce')
			,
			'reg_eli' => $request->getVar('reg_eli')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_mun' => $id,
			'cod_int_mun' => $request->getVar('cod_int_mun')
			,
			'nom_mun' => $request->getVar('nom_mun')
			,
			'cod_dep_mun' => $request->getVar('cod_dep_mun')
			,
			'des_mun' => $request->getVar('des_mun')
			,
			'fec_crea' => $request->getVar('fec_crea')
			,
			'fec_modif' => $request->getVar('fec_modif')
			,
			'usu_acce' => $request->getVar('usu_acce')
			,
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
		$array = ["cod_mun as id", "nom_mun", 'cod_dep_mun'];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-29-2024 04:21:15 pm */