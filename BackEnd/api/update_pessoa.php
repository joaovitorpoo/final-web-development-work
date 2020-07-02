<?php

include __DIR__.'/../control/PessoaControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);

$id = $obj->id;

if(!$id) {
	http_response_code(400);
	echo json_encode(array("mensagem" => "É necessário um ID para atualização"));
}
else {
	if(!empty($data)){	
	 $pessoaControl = new PessoaControl();
	 $pessoaControl->update($obj, $id);
	}
}

?>