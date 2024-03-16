<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\api\UsuarioApiModel;
use Firebase\JWT\JWT;


// use vendor\Firebase\JWT\JWT;

class Login extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		$userModel = new UsuarioApiModel();

		$email = md5($this->request->getVar('username'));
		$password = $this->request->getVar('password');

		$user = $userModel->where('susu', $email)->first();

		//echo para git
		// $user = $userModel->where('log_usu', $email)->first();
		// echo $user->getCompiledSelect();
		// print_r($user);


		if (is_null($user)) {
			return $this->respond(['error' => 'Invalid user.'], 401);
		}
		// echo "---" . $password;
		// echo "---";
		// echo $userpass = password_hash($password, PASSWORD_DEFAULT);
		// exit();

		$pwd_verify = password_verify($password, $user['spas']);

		if (!$pwd_verify) {
			return $this->respond(['error' => 'Invalid username or password.'], 401);
		}
		//  else {
		// 	echo "si es usuario";
		// }

		$key = getenv('JWT_SECRET');
		$iat = time(); // current timestamp value
		$exp = $iat + 3600;

		$payload = array(
			"iss" => "PSB",
			"sub" => "pizarron",
			"iat" => $iat, //Time the JWT issued at
			"exp" => $exp, // Expiration time of token
			"email" => $user['nom_usu'],
		);

		$token = JWT::encode($payload, $key, 'HS256');

		$response = [
			'usuario' => $user['nom_usu'],
			'perfil' => $user['cod_per_usu'],
			'message' => 'Login Succesful',
			'token' => "Bearer" . ' ' . $token,
			'usertoken' => $user['token_usu']
		];

		return $this->respond($response, 200);
	}
}
