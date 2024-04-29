<?php

 namespace App\Controllers;

 use MF\Controller\Action;
 use MF\Model\Container;
 



    class IndexController extends Action{
       
       
        public function index(){
        
        $this->render('index');
        }
        public function inscreverse(){
            $this->render('inscreverse',);
        }
        public function registrar(){
       
        echo '<pre>';
            print_r($_POST);
        echo '</pre>';
        //instanciar  usuário
        $usuario = Container::getModel('Usuario');
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);
        
     

        if($usuario->validarCadastro()){
            if(count($usuario->getUsuarioPorEmail()) ==0){
      
                $usuario->salvar();
                $this->render('cadastro');
        }
      
       }else{
        ///tratar do erro
       }
        
        

        //sucesso
        //erro

        }
    
       
    }

?>