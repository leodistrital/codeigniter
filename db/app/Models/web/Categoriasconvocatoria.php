<?php

namespace App\Models\web;

use CodeIgniter\Model;

class Categoriasconvocatoria extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categoriasconvocatoria';
	protected $primaryKey           = 'cod_cac';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['edi_cac', 'nom_cac', 'tit_cac', 'des_cac', 'img_cac', 'ord_cac', 'ad1_cac',  'ad2_cac' ,'ico_cac'];
	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;
	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function listatardatos($id = 0)
	{
		$array = ['cod_sit as id', 'fac_sit', 'twt_sit', 'lla_sit', 'mai_sit', 'dir_sit', 'ciu_sit', 'log_sit', 'nom_sit'];

		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}