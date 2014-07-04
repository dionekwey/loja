<?php
session_start(); 
$nome = isset($_SESSION['nome'])? $_SESSION['nome']:'';
$senha = isset($_SESSION['senha'])? $_SESSION['senha']:'';
$logado=false;

if ($nome!='' && $senha!=''){
    $logado=true;
}
?>
