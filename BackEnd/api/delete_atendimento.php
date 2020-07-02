<?php

include __DIR__.'/../control/AtendimentoControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if(!empty($data)){	
    $atendimentoControl = new AtendimentoControl();
    $atendimentoControl->delete($obj,$id);
    header('Location:listar.php');
}

?>