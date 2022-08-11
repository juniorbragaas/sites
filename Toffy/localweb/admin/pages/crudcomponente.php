<?php
$readonly = "readonly";
$titulo_pagina = "";
$botao_salvar =  "<div><button type='button' id='salvar' class='btn btn-success'>Salvar</button></div>";
$botao_alterar =  "<div><button type='button' id='alterar' class='btn btn-success'>Alterar</button></div>";
$botao_excluir =  "Confirma Ação? <div><button type='button' id='confirmar' class='btn btn-success'>Sim</button><button type='button' id='desistir' class='btn btn-danger'>Não</button></div>";
$botao_acao="";
if (isset($_GET['acao'])){
	switch($_GET['acao']){
            case 'cadastrar':
               $titulo_pagina = "$nome_tela : Cadastrar";
			   $botao_acao = $botao_salvar;
               $readonly = "";			   
            break;
            case 'editar':
			   $titulo_pagina = "$nome_tela : Alterar ID = ".$_GET['id'];
               $botao_acao = $botao_alterar;			   
			   $readonly = "";
            break;
			case 'ver':
               $titulo_pagina = "$nome_tela : Ver ID = ".$_GET['id'];
               $botao_acao = "";			   
               $readonly = " readonly = 'readonly' ";			   
            break;
            case 'apagar':
			   $titulo_pagina = "$nome_tela : Excluir ID = ".$_GET['id'];
			   $botao_acao = $botao_excluir;
               $readonly = " readonly = 'readonly' ";				   
            break;
        }
}
?>
<div id="titulo" class="titulo_pagina" style="width:100%; background-color:#2b8cb4; font-size:20px;"><center><?php echo $titulo_pagina ?></center></div>