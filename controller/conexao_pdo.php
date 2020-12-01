<?php
//$url = 'mysql:host=187.45.196.174;dbname=dbaegbec';
$url = 'mysql:host=127.0.0.1;dbname=dbaegbec';
$user = 'root';
$senha = '';
//$senha = 'ramos140709#';
//pdo_drivers();
$conexao='';
try {
    $conexao = new PDO($url, $user, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexao->exec("set names utf8");
    //echo 'CONNECTADO COM SUCESSO...';
} catch (PDOException $ex) {
    echo 'falha naconexao ..' . $ex->getMessage();
}