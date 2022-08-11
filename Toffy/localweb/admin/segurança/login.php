<?php
// include '../inc/js.php';

if(empty($_POST['nome'])||empty($_POST['senha'])){
    echo "<script>alert('Por favor, todos campos devem ser preenchidos!');</script> <br /><br />";
    $view = "../pages/paginaLogin.php";
    echo"<script>location.href='../index.php'</script>";
}
else
{
ob_start(); //pesquisar oqq é isso
session_start();//inicia a session
    include '../class/Usuario.php';
    $usuario = new Usuario();
    $nome = isset($_POST['nome']) ? addslashes(trim($_POST['nome'])) : false;
    $senha = sha1($_POST['senha']); //ver algo melhor para isso //!re adicionar esta parte

    if( $usuario->login($nome,$senha)){
        // var_dump($dados);
        //tem q fazer uma requisição ajax para a proxima pagina
//         echo "<script> alert('Valido');location.href='pages/Bemvindo.php'; </script>"; //!mudar
//            header("Location: $view");
        // echo "<script>alert('Valido');</script>";
        $view = "../pages/Bemvindo.php";
        echo "<script>window.history.pushState('', '', '/');</script>";
        echo "<script>location.href='../index.php'</script>";
    }
    else
    {
        session_destroy();
        echo "<script>alert('Voce nao pode logar-se! Este usuario e/ou senha nao sao validos!'); alert('Por favor tente novamente!');</script>";
        $view = "../pages/paginaLogin.php";
        echo"<script>location.href='../index.php'</script>";
    }
}
?>