<?php

class Consumer
{
	public $cnpj;
     public $razaoSocial;
     public $nomeFantasia;
     public $endereco;
     public $numero;
	public $bairro;
     public $cidade;
     public $uf;
     public $publicoAlvo;
     public $site;
     public $email;
     public $tel;
     public $nomeResponsavel;
     public $cel;

	public function sendPost($data)
	{
		if(isset($data["cnpj"]) and isset($data["razaoSocial"]) and isset($data["nomeFantasia"]) and isset($data["endereco"])
			and isset($data["numero"]) and isset($data["bairro"]) and isset($data["cidade"]) and isset($data["uf"])
			and isset($data["publicoAlvo"]) and isset($data["site"]) and isset($data["email"]) and isset($data["tel"])
			and isset($data["nomeResponsavel"]) and isset($data["cel"])){

			$this->cnpj = $data["cnpj"];
			$this->razaoSocial = $data["razaoSocial"];
			$this->nomeFantasia = $data["nomeFantasia"];
			$this->endereco = $data["endereco"];
			$this->numero = $data["numero"];
			$this->bairro = $data["bairro"];
			$this->cidade = $data["cidade"];
			$this->uf = $data["uf"];
			$this->publicoAlvo = $data["publicoAlvo"];
			$this->site = $data["site"];
			$this->email = $data["email"];
			$this->tel = $data["tel"];
			$this->nomeResponsavel = $data["nomeResponsavel"];
			$this->cel = $data["cel"];
		}

		$dataEnvio = array("cnpj" => $this->cnpj, "razaoSocial" => $this->razaoSocial, "nomeFantasia" => $this->nomeFantasia,
			"endereco" => $this->endereco, "numero" => $this->numero, "bairro" => $this->bairro, "cidade" => $this->cidade,
			"uf" => $this->uf, "publicoAlvo" => $this->publicoAlvo, "site" => $this->site, "email" => $this->email,
			"tel" => $this->tel, "nomeResponsavel" => $this->nomeResponsavel, "cel" => $this->cel);

		$ch = curl_init("http://localhost/api/entidades");
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

	public function sendGetAll()
	{
		$ch = curl_init("http://localhost/api/entidades");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$response = curl_exec($ch);
		curl_close($ch);
		if(!$response){
			return false;
		}
		else{
			return $response;
		}
	}

	public function sendGetById($cnpj)
	{
		$ch = curl_init("http://localhost/api/entidades/$cnpj");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$response = curl_exec($ch);
		curl_close($ch);
		if(!$response){
			return false;
		}
		else{
			return $response;
		}
	}
}