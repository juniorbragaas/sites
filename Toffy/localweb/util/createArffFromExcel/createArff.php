<?php
    require "../../config/conexao.php";
    require_once 'Excel/reader.php';

    require "./utilitarios/validacoes.php";

    $pasta = "./uploads";

    $arquivoRecebido = $_GET['arquivo'];

    $reader = new Spreadsheet_Excel_Reader();
    $reader->setOutputEncoding("UTF-8");
    $types = array( 'xls', 'xlsx','.');

    $tabela = "tabela_". str_replace($types,"",validaAtributos($arquivoRecebido));
    
    $reader->read($pasta.'/'.$arquivoRecebido);

    $createFileSql = fopen($_SERVER['DOCUMENT_ROOT']."utils/createArffFromExcel/uploads/output" . "/Querys.sql","w+");

#region create table
    $sqlCreateTable = "DROP TABLE IF EXISTS bd_Arff; CREATE TABLE bd_Arff ( codigo INT AUTO_INCREMENT PRIMARY KEY ,";

    for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++) {
        $sqlCreateTable = $sqlCreateTable . validaAtributos($reader->sheets[0]["cells"][1][$linha]) . " TEXT NULL"." , ";
    }
    
    $sqlCreateTable = substr($sqlCreateTable,0,-2);
    $sqlCreateTable = $sqlCreateTable . ");";
    
    //echo $sqlCreateTable;
    fwrite($createFileSql,$sqlCreateTable);
    try{
        $conexao->exec($sqlCreateTable);
        //echo "Table created successfully";
    } catch(PDOException $e) {
        //echo "<br>" . $sqlCreateTable . "<br>" . $e->getMessage();
    }

    //echo "<br><hr><br>";
#endregion    
#region insert
    //echo "<br>";

    for ($coluna = 2; $coluna <= $reader->sheets[0]["numRows"]; $coluna++) {
        $sqlInsert = "INSERT INTO bd_Arff (";
        for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++) {
            $sqlInsert = $sqlInsert  . validaAtributos($reader->sheets[0]["cells"][1][$linha]) ." , ";
        }

        $sqlInsert = substr($sqlInsert,0,-2);
        $sqlInsert = $sqlInsert . ") VALUES (";
        $data = Array();
        for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++) {
            $sqlInsert = $sqlInsert . "'" . validaDados($reader->sheets[0]["cells"][$coluna][$linha]). "'" . ",";
            $data[$linha-1] = $reader->sheets[0]["cells"][$coluna][$linha];
        }
        $sqlInsert = substr($sqlInsert,0,-1);
        $sqlInsert = $sqlInsert . ");";
        //echo $sqlInsert;

        fwrite($createFileSql,$sqlInsert);
        $insert = $conexao->prepare($sqlInsert);
        $insert->execute($data);
        
        //echo "<br>";
    }
    fclose($createFileSql);
#endregion
#region write .arff
    //echo "<br><hr><br>";

    for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++){
        //echo  "SELECT DISTINCT ".validaAtributos($reader->sheets[0]["cells"][1][$linha])." FROM bd_Arff; <br>";   
    }
    // $arquivoRecebido = str_replace($types,"",$arquivoRecebido);
    $fp = fopen($_SERVER['DOCUMENT_ROOT']."utils/createArffFromExcel/uploads/output"  . "/dados.arff","w+");
    $atributos = array();
    //echo "<br><hr><br>";
    //echo "@relation $tabela<br><br>";
    fwrite($fp,"@relation $tabela \n\n");
    for ($linha1 = 1; $linha1 <= $reader->sheets[0]["numCols"]; $linha1++)
    {
        
        $SQL = " SELECT DISTINCT ".validaAtributos($reader->sheets[0]["cells"][1][$linha1])." from bd_Arff ; ";
        $atributos[$linha1-1] =  "@attribute ".validaAtributos($reader->sheets[0]["cells"][1][$linha1])." {";
        
        
        $dados = $conexao->query($SQL); 
        while ($row = $dados->fetch(PDO::FETCH_NUM)) {
            $atributos[$linha1-1] = $atributos[$linha1-1].$row[0].",";
        }
        $atributos[$linha1-1] = substr($atributos[$linha1-1], 0, -1);
                
        $atributos[$linha1-1] = $atributos[$linha1-1]."}";
        //echo $atributos[$linha1-1]."<br>";
        fwrite($fp,$atributos[$linha1-1]."\n");
    }
    //echo "<br>@data<br><br>";
    fwrite($fp,"\n@data\n\n");

    $consulta = $conexao->query("SELECT * FROM bd_Arff;");
    $consulta->execute();
    while($information = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $keys = array_keys($information);
        $acumula = "";
        for ($i=1; $i < count($information); $i++) { 
            $key = $keys[$i];
            $value = $information[$key];
            $acumula = $acumula. $value .",";
        }
        $acumula = substr($acumula,0,-1);
        //echo $acumula;
        fwrite($fp,$acumula."\n");
        //echo "<br>";
    }
    fclose($fp);
#endregion

echo "<p>Download here: </p><a href=./uploads/output". "/dados.arff download>dados.arff</a>";
echo "<p>Download here: </p><a href=./uploads/output" . "/Querys.sql download>Querys.sql</a>";

?>
