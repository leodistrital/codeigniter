<?php
namespace App\Models;
use CodeIgniter\Model;

class BannerApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'banner';
	protected $primaryKey           = 'cod_ban';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_ban as id","tit_ban","des_ban","fec_ban","url_ban","img_ban","ord_ban","fec_crea","fec_modif","usu_acce","reg_eli"];

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
		$array = ["cod_ban as id","tit_ban","des_ban","fec_ban","url_ban","img_ban","ord_ban","fec_crea","fec_modif","usu_acce","reg_eli"];
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
			'tit_ban' => $request->getVar('tit_ban')
,'des_ban' => $request->getVar('des_ban')
,'fec_ban' => $request->getVar('fec_ban')
,'url_ban' => $request->getVar('url_ban')
,'img_ban' => $request->getVar('img_ban')
,'ord_ban' => $request->getVar('ord_ban')
,'fec_crea' => $request->getVar('fec_crea')
,'fec_modif' => $request->getVar('fec_modif')
,'usu_acce' => $request->getVar('usu_acce')
,'reg_eli' => $request->getVar('reg_eli')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_ban' => $id,
			'tit_ban' => $request->getVar('tit_ban')
,'des_ban' => $request->getVar('des_ban')
,'fec_ban' => $request->getVar('fec_ban')
,'url_ban' => $request->getVar('url_ban')
,'img_ban' => $request->getVar('img_ban')
,'ord_ban' => $request->getVar('ord_ban')
,'fec_crea' => $request->getVar('fec_crea')
,'fec_modif' => $request->getVar('fec_modif')
,'usu_acce' => $request->getVar('usu_acce')
,'reg_eli' => $request->getVar('reg_eli')

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
		$array = ["cod_ban as id","tit_ban","des_ban","fec_ban","url_ban","img_ban","ord_ban","fec_crea","fec_modif","usu_acce","reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-12-2023 04:04:01 pm */