<?php 
namespace MF\Model;
abstract class Model{
    protected $pd;

    public function __construct(\PDO $db){
        $this->db = $db;
    }
}
?>