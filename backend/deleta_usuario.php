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
    // Get the ID from the form
    $id = base64_decode($_POST['id']);
    $strTable = "usuario";
    // Prepare the delete statement
    $strWhere = "id_usuario = '$id'";

    // Bind the ID parameter and execute the statement
    $objDB->dbDelete($strTable, $strWhere);
    if ($objDB->resultado == 1) {
        $retorno .= "Usuario deletado com sucesso!";
    } else {
        $retorno .= "Erro ao deletar.";
    }
}
exit("<script> alert('$retorno'); window.location.href = '../usuarios.php'; </script>");
