<?php
    $acao = $_POST['acao'];
    $codigoRecebido = $_POST['codigoEnviar'];

    $readonly = "";
	$ocultar_botao = "";
	$botao_salvar_text = "Salvar";

    switch ($acao) {
        case 'cadastrar':
            $titulo =  "Cadastrar";
            break;
        case 'alterar':
            $titulo =  "Alterar";
            break;
        case 'excluir':
            $titulo =  "Excluir";
            $readonly = "readonly";
            $mensagem = "Tem certeza que deseja excluir esse registro ?";
            $botao_salvar_text = "Sim";
            break;
    }
    require "../../config/conexao.php";
    if (isset($_POST['acao'])){
        $send_acao = $_POST['acao'];
        //remove possivel sql aki
        $codigo =isset($_POST['']);
        $id="";
        $nome="";
        $pai="";
        switch($send_acao){
            case 'cadastrar':
                //create
                $conexao = getConnection();
                $sqlReturnLastCodigo = "SELECT MAX(codigo) FROM gl_menu";
                $lastCode = $conexao->query($sqlReturnLastCodigo);
                $result = $lastCode->fetch();
                $codigo = $result[0]+1; // next number
                $tamanho = strlen($codigo);
                $acumulator = "";
                while ($tamanho < 6) {
                    $acumulator = $acumulator."0";
                    $tamanho++;
                }
                $id = $acumulator.$codigo;
                $sqlCreate = "INSERT INTO gl_menu VALUES (:codigo,:id,:nome,:ordem,:pai)";
                
                //pai e nome
            break;
            case 'alterar':
            break;
            case 'excluir'://unico que será um modal
            break;
        }
    }
    
?>

