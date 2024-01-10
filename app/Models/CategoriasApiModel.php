<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriasApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categorias';
	protected $primaryKey           = 'cod_cat';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_cat as id","nom_cat","relacion_cat","orden_cat","ord_cat","imp_cat","cod_sim_cat","annio_cat","fec_crea","fec_modif","usu_acce","reg_eli","slu_cat"];

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
		$array = ["cod_cat as id","nom_cat","relacion_cat","orden_cat","ord_cat","imp_cat","cod_sim_cat","annio_cat","fec_crea","fec_modif","usu_acce","reg_eli","slu_cat"];
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
			'nom_cat' => $request->getVar('nom_cat')
,'relacion_cat' => $request->getVar('relacion_cat')
,'orden_cat' => $request->getVar('orden_cat')
,'ord_cat' => $request->getVar('ord_cat')
,'imp_cat' => $request->getVar('imp_cat')
,'cod_sim_cat' => $request->getVar('cod_sim_cat')
,'annio_cat' => $request->getVar('annio_cat')
,'fec_crea' => $request->getVar('fec_crea')
,'fec_modif' => $request->getVar('fec_modif')
,'usu_acce' => $request->getVar('usu_acce')
,'reg_eli' => $request->getVar('reg_eli')
,'slu_cat' => $request->getVar('slu_cat')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_cat' => $id,
			'nom_cat' => $request->getVar('nom_cat')
,'relacion_cat' => $request->getVar('relacion_cat')
,'orden_cat' => $request->getVar('orden_cat')
,'ord_cat' => $request->getVar('ord_cat')
,'imp_cat' => $request->getVar('imp_cat')
,'cod_sim_cat' => $request->getVar('cod_sim_cat')
,'annio_cat' => $request->getVar('annio_cat')
,'fec_crea' => $request->getVar('fec_crea')
,'fec_modif' => $request->getVar('fec_modif')
,'usu_acce' => $request->getVar('usu_acce')
,'reg_eli' => $request->getVar('reg_eli')
,'slu_cat' => $request->getVar('slu_cat')

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
		$array = ["cod_cat as id","nom_cat","relacion_cat","orden_cat","ord_cat","imp_cat","cod_sim_cat","annio_cat","fec_crea","fec_modif","usu_acce","reg_eli","slu_cat"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-28-2023 04:33:42 pm */