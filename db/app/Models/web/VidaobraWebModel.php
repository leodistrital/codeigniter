<?php
namespace App\Models\web;
use CodeIgniter\Model;

class VidaobraWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'vidaobra';
	protected $primaryKey           = 'cod_vid';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_sim_vid","nom_vid","des_vid","disc_vid","img_vid","ban_vid","img_princ_vid","vid_vid","vid_dis_vid","linkdis_vid","fec_crea","fec_modif","usu_acce","reg_eli"];

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
		$array = ["cod_sim_vid","nom_vid","des_vid","disc_vid","img_vid","ban_vid","img_princ_vid","vid_vid","vid_dis_vid","linkdis_vid","fec_crea","fec_modif","usu_acce","reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_sim_vid', $id)->find();
		}
		return $data;
	}


	
}
/* fecha de creacion: 12-19-2023 03:05:18 pm */