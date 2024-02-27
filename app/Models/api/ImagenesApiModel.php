<?php
namespace App\Models\api;

use CodeIgniter\Model;

class ImagenesApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'imagenes';
	protected $primaryKey = 'cod_ima';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_ima as id", "tit_ima", "dir_ima", "ord_ima", "cod_gal_ima", "pie_ima", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_ima as id", "tit_ima", "dir_ima", "ord_ima", "cod_gal_ima", "pie_ima", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
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
			'tit_ima' => $request->getVar('tit_ima')
			,
			'dir_ima' => $request->getVar('dir_ima')
			,
			'ord_ima' => $request->getVar('ord_ima')
			,
			'cod_gal_ima' => $request->getVar('id')
			,
			'pie_ima' => $request->getVar('pie_ima')
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
			'cod_ima' => $id,
			'tit_ima' => $request->getVar('tit_ima')
			,
			'dir_ima' => $request->getVar('dir_ima')
			,
			'ord_ima' => $request->getVar('ord_ima')
			,
			'cod_gal_ima' => $request->getVar('cod_gal_ima')
			,
			'pie_ima' => $request->getVar('pie_ima')
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

	public function parametros($id)
	{
		$array = ["cod_gal_ima", "dir_ima", "cod_ima"];
		$data = $this->select($array)->where('cod_gal_ima', $id)->findAll();
		return $data;
	}


	// public function parametros()
	// {
	// 	$array = ["cod_pre as value", "tit_pre as name"];
	// 	$data = $this->select($array)->where('pad_pre', 0)->orderBy('ord_pre', 'ASC')->findAll();
	// 	return $data;
	// }

	// public function parametros()
	// {
	// 	$array = ["cod_ima as id","tit_ima","dir_ima","ord_ima","cod_gal_ima","pie_ima","fec_crea","fec_modif","usu_acce","reg_eli"];
	// 	$data = $this->select($array)->findAll();
	// 	return $data;
	// }
}
/* fecha de creacion: 01-23-2024 11:16:22 am */