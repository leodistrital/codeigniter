<?php
namespace App\Models\web;
use CodeIgniter\Model;

class InvitadosWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'invitados';
	protected $primaryKey           = 'cod_inv';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_inv","des_inv","img_inv","ban_inv","pdf_inv","video_inv","cod_sim_inv","fec_crea","fec_modif","usu_acce","reg_eli"];

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
		$array = ["nom_inv","des_inv","img_inv","ban_inv","pdf_inv","video_inv","cod_sim_inv","fec_crea","fec_modif","usu_acce","reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_sim_inv',$id)->find();
		}
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 07:24:15 pm */