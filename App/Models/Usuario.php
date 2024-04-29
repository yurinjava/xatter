<?php
namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
//salvar
    public function salvar(){
        $query = "insert into usuarios(nome, email, senha)values(:nome, :email, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__GET('nome'));
        $stmt->bindValue(':email', $this->__GET('email'));
        $stmt->bindValue(':senha', $this->__GET('senha'));
        $stmt->execute();

        return $this;
    }



//validar cadastro
    public function validarCadastro(){
        $valido = true;
        if(strlen($this->__get('nome')) < 3){
           $valido = false;
        }
        if(strlen($this->__get('email')) < 3){
            $valido = false;
         }
         if(strlen($this->__get('senha')) < 3){
            $valido = false;
         }
        return $valido;
    }

//recuperar usuario por email
    public function getUsuarioPorEmail(){
        $query = "select nome, email from usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>