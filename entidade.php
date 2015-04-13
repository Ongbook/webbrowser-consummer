<?php
require_once 'sm.php';
require_once 'consumers/consumer.php';

if($_GET != null){
	$ctl = new Consumer();
	$dados = $ctl->sendGetById($_GET['cnpj']);
	$exibir = json_decode($dados);
}

$sm->assign("cnpj",$exibir->cnpj);
$sm->assign("razaoSocial",$exibir->razaoSocial);
$sm->assign("nomeFantasia",$exibir->nomeFantasia);
$sm->assign("endereco",$exibir->endereco);
$sm->assign("numero",$exibir->numero);
$sm->assign("bairro",$exibir->bairro);
$sm->assign("cidade",$exibir->cidade);
$sm->assign("uf",$exibir->uf);
$sm->assign("publicoAlvo",$exibir->publicoAlvo);
$sm->assign("site",$exibir->site);
$sm->assign("email",$exibir->email);
$sm->assign("tel",$exibir->tel);
$sm->assign("nomeResponsavel",$exibir->nomeResponsavel);
$sm->assign("cel",$exibir->cel);

$sm->display("entidade.html");