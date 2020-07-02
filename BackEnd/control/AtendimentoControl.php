<?php
include __DIR__.'/../model/Atendimento.php';

class AtendimentoControl{
	function insert($obj){		
		$atendimento = new Atendimento();	
		/* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */			
		return $atendimento->insert($obj);		
	}

	function update($obj,$id){
		$atendimento = new Atendimento();
		return $atendimento->update($obj,$id);
	}

	function delete($obj,$id){
		$atendimento = new Atendimento();
		return $atendimento->delete($obj,$id);
	}

	function find($id = null){
		$atendimento = new Atendimento();
		return $atendimento->find($id);
	}

	function findAll(){
		$atendimento = new Atendimento();
		return $atendimento->findAll();
	}
}

?>