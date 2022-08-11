 <?php
	session_start();
	
	$eu = $_SESSION['username'];
	
	//echo "<br>$usuario<br>"; exit;
 include("../../config/conexao.php");
include("../../js/dhtmlxSuite/sources/dhtmlxConnector_php/codebase/grid_connector.php");//includes related connector file
$res=mysql_connect($servidor,$usuario,$senha);//connects to server containing the desired DB
mysql_select_db($base_dados);           //connects to DB.'sampledb' is the name of our DB
mysql_query("SET NAMES UTF8");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$conn = new GridConnector($res,"MySQL");                    // connector initialization
//$conn ->dynamic_loading(10);
$config = new GridConfiguration();
//CONFIGURAR LABELS
$config->setHeader(array("Codigo","Tipo","Data","Categoria","Descricao","Empresa","Responsavel","Observacao","Prazo","Status","Cadastrado por"));
//CONFIGURAR TIPOS DE COLUNA
$config->setColTypes(array("ro","ro","ro","ro","ro","ro","ro","ro","ro","ro","ro"));
//CONFIGURAR ALINHAMENTO DE COLUNA
$config->setColAlign(array("left","left","left","center","left","left","left","left","left","left","left"));
//CONFIGURAR LARGURA DE COLUNA
$config->setInitWidths(array("100","160","160","160","100","120","160","120","160","120","120","160","160"));
//CONFIGURAR TIPOS DE FILTRO DE COLUNAS
$config->setColSorting(array("int","str","str","str","int","str","str","str","str","str","str","str"));
//DELIMITADOR DE CONFIGURAÇÃO DE CABEÇALHO
$config->setHeaderDelimiter(",");
//ADICIONANDO FILTRO DE PESQUISA
$config->attachHeader("#numeric_filter,#text_filter,#text_filter,#combo_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter,#combo_filter,#text_filter",null);
 
$conn->set_config($config);
$SQL = "
SELECT
*
FROM
(
SELECT
*
FROM
(
SELECT 
c.codigo as numero_chamado,
c.data_abertura as data,
'Tarefa' as tipo,
t.nome as categoria,
c.descricao as descricao,
e.nome as empresa,
a.nome_completo as nome,
c.observacao_atual as observacao,
c.data_prazo as prazo,
if(c.status = 0,'Cancelado',if(c.status = 1,'Pendente','Concluído')) as status,
c.cadastrado_por as cadastrado_por

 
FROM 
tc_chamado c
INNER JOIN tc_categoria t On t.codigo = c.categoria
INNER JOIN tc_empresa e On e.codigo = c.empresa
INNER JOIN tc_atendentes a On a.codigo = c.responsavel_atual
INNER JOIN tc_users u On u.profissional = a.codigo

WHERE u.login = '$eu'

) t1

UNION ALL

SELECT
*
FROM
(
SELECT 
c.codigo as numero_chamado,
c.data_abertura as data,
'Delegada' as tipo,
t.nome as categoria,
c.descricao as descricao,
e.nome as empresa,
a.nome_completo as nome,
c.observacao_atual as observacao,
c.data_prazo as prazo,
if(c.status = 0,'Cancelado',if(c.status = 1,'Pendente','Concluído')) as status,
c.cadastrado_por as cadastrado_por

 
FROM 
tc_chamado c
INNER JOIN tc_categoria t On t.codigo = c.categoria
INNER JOIN tc_empresa e On e.codigo = c.empresa
INNER JOIN tc_atendentes a On a.codigo = c.responsavel_atual
INNER JOIN tc_users u On u.profissional = a.codigo

WHERE c.cadastrado_por = '$eu'

) t2

) t3


GROUP BY numero_chamado
ORDER BY data DESC

";

//echo "<br>$SQL<br>"; exit;
$conn->render_complex_sql($SQL,"numero_chamado","numero_chamado,tipo,data,categoria,descricao,empresa,nome,observacao,prazo,status,cadastrado_por");     // data configuration
?>
	 

        