<?php
require_once 'sm.php';
require_once 'consumers/preCadastro.php';

$nome;
$email;
$captcha;
$sendCadastro;

if(isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['g-recaptcha-response']))
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$captcha = $_POST['g-recaptcha-response'];

	$sendCadastro = array("nome" => $nome, "email" => $email);

	if(!$captcha)
	{
		echo '<h2>Por favor, cheque o captcha.</h2>';
		exit;
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

$sm->assign("legend","Dados do Responsável");

$sm->display("body.html");