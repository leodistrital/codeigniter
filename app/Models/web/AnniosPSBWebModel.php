<?php
namespace App\Models\web;

use CodeIgniter\Model;

class AnniosPSBWebModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'anniosPSB';
	protected $primaryKey = 'cod_ap';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["annio_ap", "edicion_ap", "esp_ap", "orden_ap", "act_ap"];

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
		$array = ["annio_ap", "edicion_ap", "esp_ap", "orden_ap", "act_ap"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function listaindividual()
	{
		$array = ["annio_ap", "edicion_ap", "esp_ap", "orden_ap", "act_ap"];
		$arraywhere = ['annio_ap>' => 2011, 'act_ap=' => 1];
		$data = $this->select($array)->where($arraywhere)->orderBy('cod_ap', 'DESC')->find();
		return $data;
	}

	public function listaGrupo()
	{
		$array = ['cod_ap', "annio_ap", "edicion_ap", "esp_ap", "orden_ap", "act_ap"];
		$data = $this->select($array)->where('esp_ap ', 1)->orderBy('orden_ap', 'DESC')->find();
		return $data;
	}

	public function listaGrupoItem($idmenu = 0)
	{
		$array = ["annio_ap", "edicion_ap", "esp_ap", "orden_ap", "act_ap"];
		$data = $this->select($array)->where('annio_ap >', 2011)->orderBy('cod_ap', 'DESC')->find();
		return $data;
	}


}
/* fecha de creacion: 12-18-2023 04:10:51 pm */