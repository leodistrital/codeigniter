<?php
namespace App\Models\api;

use CodeIgniter\Model;

class SectorApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'sector';
	protected $primaryKey = 'cod_sec';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_sec as id", "nom_sec", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_sec as id", "nom_sec", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function buscarlistatardatos($request)
	{
		if (!empty($request->getVar("id")))
			$this->where('cod_sec', $request->getVar("id"));
		$array = ["cod_sec as id", "nom_sec", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->find();
		return $data;
		// echo $this->getLastQuery();
	}


	public function guardar($request)
	{

		$data = [
			'nom_sec' => $request->getVar('nom_sec')
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
			'cod_sec' => $id,
			'nom_sec' => $request->getVar('nom_sec')
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
		$array = ["cod_sec as id", "nom_sec"];
		$data = $this->select($array)->orderBy("nom_sec")->findAll();
		return $data;
	}
}
/* fecha de creacion: 02-05-2024 04:18:46 pm */