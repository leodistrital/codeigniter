<?php
namespace App\Models\web;
use CodeIgniter\Model;

class DiscursosWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'discursos';
	protected $primaryKey           = 'cod_dis';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_sim_dis","nom_dis","per_dis","des_dis","img_dis","ban_dis","vid_dis","pdf_dis","ord_dis","fec_crea","fec_modif","usu_acce","reg_eli"];

	// Dates
	protected $useTimestamps        = true;
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
		$array = ["cod_sim_dis","nom_dis","per_dis","des_dis","img_dis","ban_dis","vid_dis","pdf_dis","ord_dis","fec_crea","fec_modif","usu_acce","reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_sim_dis',$id )->orderBy('ord_dis ASC')->find();
		}
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 07:29:09 pm */