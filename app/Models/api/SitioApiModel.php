<?php

namespace App\Models\api;

use CodeIgniter\Model;

class SitioApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'sitio';
	protected $primaryKey = 'cod_sit';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_sit as id", "fac_sit", "nom_sit", "twt_sit", "ins_sit", "you_sit", "mai_sit", "dir_sit", "tel_sit", "con_sit", "sel_sit", "pro_sit", "key_sit", "ana_sit", "vidaobra_sit", "perano_sit", "gana_dit", "jurado_sit", "invitado_sit", "discursos", "videos_sit", "banner_sit", "bases_sit", "libro_sit", "act_str_sit", "url_str_sit", "cronometro_sit", 'fec_fin_sit'];

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
		$array = ["cod_sit as id", "fac_sit", "nom_sit", "twt_sit", "ins_sit", "you_sit", "mai_sit", "dir_sit", "tel_sit", "con_sit", "sel_sit", "pro_sit", "key_sit", "ana_sit", "vidaobra_sit", "perano_sit", "gana_dit", "jurado_sit", "invitado_sit", "discursos", "videos_sit", "banner_sit", "bases_sit", "libro_sit", "act_str_sit", "url_str_sit", "cronometro_sit", 'fec_fin_sit'];
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
			'fac_sit' => $request->getVar('fac_sit'),
			'nom_sit' => $request->getVar('nom_sit'),
			'twt_sit' => $request->getVar('twt_sit'),
			'ins_sit' => $request->getVar('ins_sit'),
			'you_sit' => $request->getVar('you_sit'),
			'mai_sit' => $request->getVar('mai_sit'),
			'dir_sit' => $request->getVar('dir_sit'),
			'tel_sit' => $request->getVar('tel_sit'),
			'con_sit' => $request->getVar('con_sit'),
			'sel_sit' => $request->getVar('sel_sit'),
			'pro_sit' => $request->getVar('pro_sit'),
			'key_sit' => $request->getVar('key_sit'),
			'ana_sit' => $request->getVar('ana_sit'),
			'vidaobra_sit' => $request->getVar('vidaobra_sit'),
			'perano_sit' => $request->getVar('perano_sit'),
			'gana_dit' => $request->getVar('gana_dit'),
			'jurado_sit' => $request->getVar('jurado_sit'),
			'invitado_sit' => $request->getVar('invitado_sit'),
			'discursos' => $request->getVar('discursos'),
			'videos_sit' => $request->getVar('videos_sit'),
			'banner_sit' => $request->getVar('banner_sit'),
			'bases_sit' => $request->getVar('bases_sit'),
			'libro_sit' => $request->getVar('libro_sit'),
			'act_str_sit' => $request->getVar('act_str_sit'),
			'url_str_sit' => $request->getVar('url_str_sit'),
			'cronometro_sit' => $request->getVar('cronometro_sit'),
			'fec_fin_sit' => $request->getVar('fec_fin_sit')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_sit' => $id,
			'fac_sit' => $request->getVar('fac_sit'),
			'nom_sit' => $request->getVar('nom_sit'),
			'twt_sit' => $request->getVar('twt_sit'),
			'ins_sit' => $request->getVar('ins_sit'),
			'you_sit' => $request->getVar('you_sit'),
			'mai_sit' => $request->getVar('mai_sit'),
			'dir_sit' => $request->getVar('dir_sit'),
			'tel_sit' => $request->getVar('tel_sit'),
			'con_sit' => $request->getVar('con_sit'),
			'sel_sit' => $request->getVar('sel_sit'),
			'pro_sit' => $request->getVar('pro_sit'),
			'key_sit' => $request->getVar('key_sit'),
			'ana_sit' => $request->getVar('ana_sit'),
			'vidaobra_sit' => $request->getVar('vidaobra_sit'),
			'perano_sit' => $request->getVar('perano_sit'),
			'gana_dit' => $request->getVar('gana_dit'),
			'jurado_sit' => $request->getVar('jurado_sit'),
			'invitado_sit' => $request->getVar('invitado_sit'),
			'discursos' => $request->getVar('discursos'),
			'videos_sit' => $request->getVar('videos_sit'),
			'banner_sit' => $request->getVar('banner_sit'),
			'bases_sit' => $request->getVar('bases_sit'),
			'libro_sit' => $request->getVar('libro_sit'),
			'act_str_sit' => $request->getVar('act_str_sit'),
			'url_str_sit' => $request->getVar('url_str_sit'),
			'cronometro_sit' => $request->getVar('cronometro_sit'),
			'fec_fin_sit' => $request->getVar('fec_fin_sit')

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
		$array = ["cod_sit as id", "fac_sit", "nom_sit", "twt_sit", "ins_sit", "you_sit", "mai_sit", "dir_sit", "tel_sit", "con_sit", "sel_sit", "pro_sit", "key_sit", "ana_sit", "vidaobra_sit", "perano_sit", "gana_dit", "jurado_sit", "invitado_sit", "discursos", "videos_sit", "banner_sit", "bases_sit", "libro_sit", "act_str_sit", "url_str_sit", "cronometro_sit"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-22-2024 05:37:26 pm */