<?php

extract($_POST);
/*
    REQUIRE INICIAIS.
*/
require_once '../php/session_check.php';
require_once '../php/db.class.php';
require_once '../php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$cookie = base64_decode($_COOKIE['pf']);
switch($cookie){
    case 1:
    case 2:
        break;
    case 3:
    case 4: 
        exit("<script> alert('Permissão Negada.'); window.location.href = 'dashboard.php'; </script>");
        break;   
}
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$retorno = "";
if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];

    $strTable = "usuario";
    $strSQL = "
            nome='$nome',
            login='$username',
            senha='$password',
            perfil_id_perfil='$cargo',
            cpf_usuario='$cpf'";

    $strWhere = "id_usuario = '$id' ";
    $objDB->dbUpdate($strTable, $strSQL, $strWhere);

    if ($objDB->resultado == 1) {
        $retorno .= "Atualização realizada com sucesso!";
    } else {
        $retorno .= " Erro de Atualização.";
    }
} else {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];


    $strTable = "usuario (nome, login, senha, perfil_id_perfil, cpf_usuario) ";
    $strSQL = " ('$nome',
                    '$username',
                    '$password',
                    '$cargo',
                    '$cpf') ";

    $objDB->dbInsert($strTable, $strSQL);

    if ($objDB->resultado == 1) {
        $retorno .= "Registro realizado com sucesso!";
    } else {
        $retorno .= " Erro de Cadastro.";
    }
}
exit("<script> alert('$retorno');   window.location = window.location.href='../usuarios.php'; </script>");
