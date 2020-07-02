<?php

include __DIR__.'/Conexao.php';

class Pessoa extends Conexao {
	private $nome;
    private $telefone;
    private $email;
    private $senha;

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    public function insert($obj){
    	$sql = "INSERT INTO pessoas(nome,telefone,email,senha) VALUES (:nome,:telefone,:email,:senha)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',  $obj->nome);
        $consulta->bindValue('telefone', $obj->telefone);
        $consulta->bindValue('email' , $obj->email);        
        $consulta->bindValue('senha' , $obj->senha);
    	return $consulta->execute();
	}

	public function update($obj,$id = null){
		$sql = "UPDATE pessoas SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('nome', $obj->nome);
		$consulta->bindValue('telefone', $obj->telefone);
		$consulta->bindValue('email' , $obj->email);
		$consulta->bindValue('senha' , $obj->senha);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM pessoas WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
        $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM pessoas WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
	}

	public function findAll(){
		$sql = "SELECT * FROM pessoas";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>