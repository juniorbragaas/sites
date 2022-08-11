 <?php
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
$config->setHeader(array("Codigo","Data","Empresa solicitante","Chamado","Aberto por","Encaminhado para","Status","Foi encaminhada?","Prazo","Fora do prazo?","Observação"));
//CONFIGURAR TIPOS DE COLUNA
$config->setColTypes(array("ro","ro","ro","ro","ro","ro","ro","ro","ro","ro","ro"));
//CONFIGURAR ALINHAMENTO DE COLUNA
$config->setColAlign(array("left","left","center","left","left","left","left","left","left","left","left"));
//CONFIGURAR LARGURA DE COLUNA
$config->setInitWidths(array("100","160","160","200","120","160","120","160","120","160","160","160","160"));
//CONFIGURAR TIPOS DE FILTRO DE COLUNAS
$config->setColSorting(array("int","str","str","int","str","str","str","str","str","str","str","str"));
//DELIMITADOR DE CONFIGURAÇÃO DE CABEÇALHO
$config->setHeaderDelimiter(",");
//ADICIONANDO FILTRO DE PESQUISA
$config->attachHeader("#numeric_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter,#combo_filter,#combo_filter,#text_filter,#combo_filter,#text_filter",null);
 
$conn->set_config($config);
$SQL = "SELECT 
h.codigo as codigo,
h.data as data,
e.nome as solicitante,
concat(c.codigo,' - ',c.descricao) as chamado,
c.cadastrado_por as aberto_por,
a2.nome_completo as encaminhado_para,
if(h.status = 0,'Cancelado',if(h.status = 1,'Pendente','Concluído')) as status,
if(h.encaminhado_de is null,'N','S') as foi_encaminhada,
c.data_prazo as prazo,
if(h.data > c.data_prazo,'S','N') as fora_prazo,
h.observacao as observacao
FROM
tc_chamado_historico h
INNER JOIN tc_chamado c ON c.codigo = h.numero_chamado 
LEFT JOIN tc_empresa e On e.codigo = c.empresa
LEFT JOIN tc_atendentes a ON h.encaminhado_de = a.codigo
LEFT JOIN tc_atendentes a2 ON h.encaminhado_para = a2.codigo";
$conn->render_complex_sql($SQL,"codigo","codigo,data,solicitante,chamado,aberto_por,encaminhado_para,status,foi_encaminhada,prazo,fora_prazo,observacao");     // data configuration
?>
	 

        