<?php
require_once 'sm.php';

class Error
{
	private static $msg;

	function msgError($mensenger)
	{
		$this->msg = $mensenger;

		$mensagem = $this->msg;
	}



}

$sm->assign("mensagem",$mensagem);

$sm->display("erros.html");
