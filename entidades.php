<?php
require_once 'sm.php';
require_once 'consumers/consumer.php';

$ctl = new Consumer();
$dados = $ctl->sendGetAll();
$exibir = json_decode($dados, true);

$sm->assign("title", "Entidades Sociais");

$sm->assign("lista",$exibir);

$sm->display("entidades.html");
