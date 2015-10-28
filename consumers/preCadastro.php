<?php

class PreCadastro
{
	public $nome;
	public $email;

	public function sendPost($data)
	{
		if(isset($data["nome"]) and isset($data["email"])){

			$this->nome = $data["nome"];
			$this->email = $data["email"];
		}

		$dataEnvio = array("nome" => $this->nome, "email" => $this->email);

		$ch = curl_init("http://localhost/apiSoulsolidario/usuarios");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($dataEnvio));
		$response = curl_exec($ch);
		curl_close($ch);
		if(!$response){
			return false;
		}
		else{
			var_dump($response);
		}
	}
}