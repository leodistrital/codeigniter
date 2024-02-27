<?php
namespace App\Models\api;

use CodeIgniter\Model;

class DepartamentosApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'departamentos';
	protected $primaryKey = 'cod_dep';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_dep as id", "nom_dep", "cod_ind_dep", "cod_pais_dep", "cod_per_dep", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_dep as id", "nom_dep", "cod_ind_dep", "cod_pais_dep", "cod_per_dep", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'nom_dep' => $request->getVar('nom_dep')
			,
			'cod_ind_dep' => $request->getVar('cod_ind_dep')
			,
			'cod_pais_dep' => $request->getVar('cod_pais_dep')
			,
			'cod_per_dep' => $request->getVar('cod_per_dep')
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
			'cod_dep' => $id,
			'nom_dep' => $request->getVar('nom_dep')
			,
			'cod_ind_dep' => $request->getVar('cod_ind_dep')
			,
			'cod_pais_dep' => $request->getVar('cod_pais_dep')
			,
			'cod_per_dep' => $request->getVar('cod_per_dep')
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
		$array = ["cod_dep as id", "nom_dep"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-29-2024 06:41:40 pm */