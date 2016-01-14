<?php
require_once 'sm.php';

$nome;
$email;
$sendCadastro;

if(isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['g-recaptcha-response']))
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$sendCadastro = array("nome" => $nome, "email" => $email);

	// Chave secreta Google reCaptcha
	$secret = "6LfKQhATAAAAAKZ35rWmayzEk4lVycHl8ZQsklAi";

	// Resposta vazia
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST['g-recaptcha-response']);

	$response = json_decode($response, true);
	var_dump($response);

}elseif (isset($_POST['nome']) and isset($_POST['email']) and !$_POST['g-recaptcha-response']) {
	var_dump($sendCadastro);
}


/*
	$response = json_decode($response, true);
	if($response["success"] === true)
	{
		echo "Logged In Successfully";
	}
	else
	{
		echo "You are a robot";
	}



/*	// Verificar a chave
	$recaptcha = new \ReCaptcha\ReCaptcha($secret);




	// Se submetido, verifique a resposta
	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

	if ($resp->isSuccess()){

		/*require_once 'consumers/preCadastro.php';

		$cad = new PreCadastro();
		$cad->sendPost($sendCadastro);
		echo '<h2>Cadastrado com sucesso.</h2>';


		var_dump($_POST);
		echo "<h1>Olá, " . $nome . " (" . $email . "), obrigado por enviar seu formulário!</h1>";
	}

}

*/


/*

	if ($response->isSuccess()){
		var_dump($_POST);
		echo "Olá, " . $nome . " (" . $email . "), obrigado por enviar seu formulário!";
	}
}
	else

		if(!$captcha)
		{
			$frase = "Por favor, cheque o captcha.";

			require_once 'error.php';

			$sendMsg = new Error();
			$sendMsg->msgError($frase);
			var_dump($sendMsg);

		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfKQhATAAAAAKZ35rWmayzEk4lVycHl8ZQsklAi&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		if($response.success==false)
		{
			echo '<h2>Você é um Spam! Fora daqui.</h2>';
		}else{
			$cad = new PreCadastro();
			$cad->sendPost($sendCadastro);
			echo '<h2>Cadastrado com sucesso.</h2>';
		}
	}
*/







	$sm->assign("legend","Dados do Responsável");

	$sm->display("body.html");