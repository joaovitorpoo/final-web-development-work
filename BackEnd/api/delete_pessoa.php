<?php

include __DIR__.'/../control/PessoaControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if(!empty($data)){	
    $pessoaControl = new PessoaControl();
    $pessoaControl->delete($obj,$id);
    header('Location:listar.php');
}

?>