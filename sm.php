<?php
/*
 * Este arquivo configura a inicialização do smarty
 */
require_once 'vendor/autoload.php';

$sm = new Smarty();
$sm->template_dir = "view/";
$sm->compile_dir = "temp/templates_c"; /* lembrar de dar acesso 777 nessa pasta */