<?php

require_once ('../config/conexao.php');

class Usuario
{
    public function login($login,$senha){
        $sqlUsuario="SELECT codigo,login,senha,ativo,ultimo_acesso,perfil FROM gl_usuario WHERE login = :login AND senha = :senha AND ativo = 1";//!query teste
        $conexao = getConnection();
        $dados = $conexao->prepare($sqlUsuario);
        $dados->bindValue('login',$login);
        $dados->bindValue('senha',$senha);
        $dados->execute(); //retorna um booleano
//        echo $dados->rowCount();
        if ($dados->rowCount() === 1) {
            $result = $dados->fetch();
            // var_dump($result['login']);
            // echo $result['login'];
            // o utilizador está correctamente validado
            // guardamos as suas informações numa sessão
            $_SESSION['codigo'] = $result['codigo'];
            $_SESSION['login'] = $result['login'];
            $_SESSION['perfil'] = $result['perfil'];
            //! tem que arrumar o timezone e ver isso no servidor //? como faz isso?
            $date = date('Y-m-d H:i:s');
            $update = "UPDATE gl_usuario SET ultimo_acesso=:ultimo_acesso WHERE codigo=:codigo";
            $upd = $conexao->prepare($update);
            $upd->bindValue('ultimo_acesso',$date);
            $upd->bindValue('codigo',$result['codigo']);
            $dados->execute();

            $sqlPermissao = "SELECT permissao FROM gl_perfil WHERE codigo=:perfil";
            $selectPermissao = $conexao->prepare($sqlPermissao);
            $selectPermissao->bindValue('perfil',$result['perfil']);
            $selectPermissao->execute();
            if($selectPermissao->rowCount() === 1){
                $resultPermissao = $selectPermissao->fetch();
                $_SESSION['permissao'] = $resultPermissao['permissao'];
            }
            return true;
        }
        else{
            return false;
        }
    }
}