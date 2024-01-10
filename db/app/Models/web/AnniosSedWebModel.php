<?php
namespace App\Models\web;
use CodeIgniter\Model;

class AnniosSedWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'anniosSed';
	protected $primaryKey           = 'cod_asd';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["anio_asd","cod_anio_asd","orden_asd"];

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
		$array = ["anio_asd","cod_anio_asd"];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('cod_anio_asd ','DESC')->orderBy('anio_asd ','DESC')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}
/* fecha de creacion: 12-18-2023 07:55:19 pm */