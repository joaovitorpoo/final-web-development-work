<?php

include __DIR__.'/Conexao.php';

class Atendimento extends Conexao {

	private $id;
    private $data;
    private $horario;

    function getData() {
        return $this->data;
    }

    function getHorario() {
        return $this->horario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    public function insert($obj){
    	$sql = "INSERT INTO atendimento(id,data,horario) VALUES (:id,:data,:horario)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $obj->id);
        $consulta->bindValue('data', $obj->data);
        $consulta->bindValue('horario' , $obj->horario);        
    	return $consulta->execute();
	}

	public function update($obj,$id = null){
		$sql = "UPDATE atendimento SET data = :data, horario = :horario WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('data', $obj->data);
		$consulta->bindValue('horario', $obj->horario);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM atendimento WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
        $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM atendimento WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
	}

	public function findAll(){
		$sql = "SELECT * FROM atendimento";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>