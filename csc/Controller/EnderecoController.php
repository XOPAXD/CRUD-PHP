<?php
require_once ('../Model/Endereco.php');
require_once ('../Model/EnderecoDAO.php');
require_once ('../config/DataBase.php');


$db      = new Database();

$dao     = new EnderecoDAO($db);



if($_POST["mode"] != "DLT"){
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$data_reg = date('Y-m-d',strtotime($_POST['data_reg']));
} 

$id =  $_POST['id'];

$endereco = new Endereco();
$endereco->setLogradouro($logradouro);
$endereco->setComplemento($complemento);
$endereco->setNumero($numero);
$endereco->setData($data_reg);
$endereco->setId($id);

switch ($_POST["mode"]) {
  case "INS":
    $dao->add($endereco); 
    break;
  case "UPD":
    $dao->update($endereco); 
    break;
  case "DLT":  
  	$dao->delete($endereco); 
    break;
}


header('Location: ../View/ListaEndereco.php');


