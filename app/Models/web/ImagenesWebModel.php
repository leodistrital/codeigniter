<?php
namespace App\Models\web;

use CodeIgniter\Model;

class ImagenesWebModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'imagenes';
	protected $primaryKey = 'cod_ima';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["tit_ima", "dir_ima", "ord_ima", "cod_gal_ima", "pie_ima", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["tit_ima", "dir_ima", "ord_ima", "cod_gal_ima", "pie_ima", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_gal_ima', $id)->orderBy('ord_ima')->find();
		}
		return $data;
	}
}
/* fecha de creacion: 01-09-2024 06:54:03 pm */