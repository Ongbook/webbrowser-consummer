<?php
require_once 'sm.php';
require_once 'consumers/preCadastro.php';


if(isset($_POST['nome']) and isset($_POST['email'])){
	cad = new PreCadastro();
	cad->sendPost($_POST);
}

$sm->assign("titulo","Primeira etapa");
$sm->assign("legend","Dados do Responsável");

$sm->display("preCadastro.html");
