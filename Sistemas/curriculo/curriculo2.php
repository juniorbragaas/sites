
<?
require_once("pdf/fpdf/fpdf.php");
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y H:i');
$frase = 'Atualizado '.$data;
$resumo = 'Profissional com mais de 10 anos de experiencia no desenvolvimento de software e sites Trabalhos com sistema web, portais e servicos utilizando metodologias ageis. Facilidade de aprendizado, suporte e treinamento de equipes Disponibilidade imediata para mudan�a e viagens.';
 
$pdf= new FPDF("P","pt","A4");
 
$pdf->AddPage();
$pdf->SetDrawColor(70,130,180);

  $pdf->SetFillColor(70,130,180);
  $pdf->Rect(0,0,180,1000, 'DF');
$pdf->SetFont('arial','B',8);
$pdf->SetTextColor(256,256,256);
$pdf->Ln(1);
$pdf->SetFont('arial','B',30);
$pdf->SetTextColor(70,130,180);
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('foto.png',10,10,-300);
$pdf->Cell(650,0,"Valdelei Junior Braga",0,1,'C');
$pdf->Ln(30);

//Resumo Profissional
$pdf->SetFont('arial','B',12);
$pdf->Cell(650,20,"RESUMO",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetX("180");
$pdf->MultiCell(0,15, $resumo,10,'J', false);
$pdf->Ln(30);

 $pdf->SetFont('arial','B',12);
 $pdf->SetTextColor(256,256,256);
 $pdf->Cell(130,20,"DADOS PESSOAIS",0,0,'C');
 $pdf->Ln(30);
$pdf->SetFont('arial','B',9);
$pdf->SetTextColor(256,256,256);
$pdf->Cell(130,20,'Cidade Natal: S�o Jo�o Del Rei - MG',0,1,'C');
$pdf->Cell(130,20,'Cidade Atual: S�o Jo�o Del Rei - MG',0,1,'C');
$pdf->Cell(130,20,'Telefone : (32)99824-3601',0,1,'C');
$pdf->Cell(130,20,'E-Mail : junior.braga.as@gmail.com',0,1,'C');

$pdf->Ln(30);
$pdf->SetFont('arial','B',12);
 $pdf->SetTextColor(256,256,256);
 $pdf->Cell(130,20,"HABILIDADES",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',9);
$pdf->SetTextColor(256,256,256);
$pdf->Cell(130,20,'Planejamento e Controle Financeiro',0,1,'C');
$pdf->Cell(130,20,'Desenvolvimento DOT.NET',0,1,'C');
$pdf->Cell(130,20,'Banco de Dados Relacionais',0,1,'C');
$pdf->Cell(130,20,'Design Gr�fico',0,1,'C');
 
 $pdf->Ln(30);
$pdf->SetFont('arial','B',12);
 $pdf->SetTextColor(256,256,256);
 $pdf->Cell(130,20,"IDIOMAS",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',9);
$pdf->SetTextColor(256,256,256);
$pdf->Cell(130,20,'Portugues Nativo',0,1,'C');
$pdf->Cell(130,20,'Ingl�s Intermedi�rio',0,1,'C');
$pdf->Cell(130,20,'Franc�s B�sico',0,1,'C');
$pdf->Ln(10);

 $pdf->Ln(30);
$pdf->SetFont('arial','B',12);
 $pdf->SetTextColor(256,256,256);
 $pdf->Cell(130,20,"OUTROS CURSOS",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',9);
$pdf->SetTextColor(256,256,256);
$pdf->Cell(130,20,'Microsoft S2B Infraestrutura de Redes',0,1,'C');
$pdf->Cell(130,20,'Curso Web Design (Corel,Photosoft,HTML)',0,1,'C');
$pdf->Cell(130,20,'Curso B�sico de Inform�tica',0,1,'C');
$pdf->Ln(10);
 
 $pdf->SetY("180");
$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(650,20,"EXPERI�NCIA PROFISSIONAL",0,0,'C');
$pdf->Ln(15);

$pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2020-2021 - BHS - Belo Horizonte MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista Desenvolvedor S�nior',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Desenvolvimento Web Full Stack Dot.NET ',0,1,"L");
  $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Back End : API Net Core,Arquitetura MVC ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Front End : Jquery,Angular 5.0 ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Banco de Dados : SQL Server',0,1,"L");
 $pdf->Ln(15);

 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2020-2020 - SYSMAP - Belo Horizonte MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista Desenvolvedor S�nior',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Desenvolvimento Web Full Stack Dot.NET ',0,1,"L");
  $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Back End : API Net Core,Arquitetura MVC ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Front End : Jquery,Angular 5.0 ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Banco de Dados : SQL Server',0,1,"L");
 $pdf->Ln(15);
 
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2018-2019 - SQUADRA - Belo Horizonte/Lavras MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista Desenvolvedor',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Desenvolvimento Web Full Stack Dot.NET ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Back End : API Net Core,Net Framekork 4.0 ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Front End : Angular 5.0 , Jquery',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Banco de dados : SQL Server,Oracle, Dbase ',0,1,"L");
 $pdf->Ln(15);
 
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2016-2018 - ALFADESIGN - S�o Jo�o Del Rei MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista de Suporte',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Suporte T�cnico de Soluc�s Comerciais de TI ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologia Back End Delphi, ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Front End : windows Todas as vers�es ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Banco de Dados : SQL Server,Firebird,MS Acess ',0,1,"L");

 
 $pdf->Ln(15);
 
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2015-2015 - GUIAMANIA - S�o Jo�o Del Rei MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista de Sistemas',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Desenvolvimento Web Full Stack PHP ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Back End: PHP',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias Front End: Jquery,HTML5 ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Banco de dados : MySQL',0,1,"L");
 $pdf->Ln(15);
 
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2011-2015 - VALE SA - Belo Horizonte MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Cargo : Analista de Sistemas',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Atividades : Desenvolvimento Web Full Stack DOT.NET ',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Tecnologias : MySQL,SAP,Web Forms C# Apache,Jquery,HTML5 ',0,1,"L");
 $pdf->Ln(15);
 
 
$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(650,20,"FORMA��O ACAD�MICA",0,0,'C');
$pdf->Ln(30);
$pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2018-Atual - UNOPAR PR',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Curso : MBA Em Gestao de projetos',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Nivel : MBA/P�s Gradua��o ',0,1,"L");
 $pdf->Ln(15);
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2008-2015 - PONTIF�CIA UNIVERSIDADE CATOLICA MG PUC MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Curso : Sistema de informa��o',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Nivel : Bacharelado ',0,1,"L");
 $pdf->Ln(15);
 $pdf->SetX("190");
 $pdf->SetFont('arial','B',9);
$pdf->SetTextColor(0,0,0);
 $pdf->Cell(130,10,'2006-2008 - PONTIF�CIA UNIVERSIDADE CATOLICA MG PUC-MG',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Curso : Tecnologia em Jogos Digitais',0,1,"L");
 $pdf->SetX("190");
 $pdf->Cell(130,10,'Nivel : Tecnologo M�dulo 1 ',0,1,"L");
 $pdf->Ln(15);
 
 

  






// $pdf->Ln(15);
// $pdf->SetFont('arial','B',20);
// $pdf->SetTextColor(70,130,180);
// $pdf->Cell(0,20,"Forma��o Acad�mica",0,0,'C');
// $pdf->Ln(30);

// /* Formacao Academica*/
// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2018-Atual',0,0,"L");
// $pdf->Cell(140,20,'UNOPAR-PR',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Curso : Gest�o de Projetos',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Tipo: P�s Gradua��o/MBA EAD',0,0,"L");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2008-2015',0,0,"L");
// $pdf->Cell(140,20,'Pontif�cia Universidade Cat�lica de Minas Gerais (PUC-MG)',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Curso : Sistemas de Informa��o',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Tipo: Bacharelado',0,0,"L");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2006-2018',0,0,"L");
// $pdf->Cell(140,20,'Pontif�cia Universidade Cat�lica de Minas Gerais (PUC-MG)',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Curso : Tecnologia em Jogos Digitais',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Tipo: Tecnologo',0,0,"L");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2004-2006',0,0,"L");
// $pdf->Cell(140,20,'Instituto Federal Sudeste de Minas Gerais Barbacena - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Curso : Programador',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Tipo: T�cnico',0,0,"L");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'1999-2001',0,0,"L");
// $pdf->Cell(140,20,'Escola Estadual C�nego Osvaldo Lustosa S�o J�ao Del Rei - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Curso : Ensino M�dio Regular',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Tipo: Ensino M�dio',0,0,"L");
// $pdf->Ln(30);
// /* FIM Formacao Academica*/


// /* Experiencia Profissional*/
// $pdf->SetFont('arial','B',20);
// $pdf->SetTextColor(70,130,180);
// $pdf->Cell(0,20,"Experi�ncia Profissional",0,0,'C');
// $pdf->Ln(30);


// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2018-2019',0,0,"L");
// $pdf->Cell(140,20,'SQUADRA TECNOLOGIA - Belo Horizonte - MG / Lavras - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo : Analista Desenvolvedor',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: Desenvolvimento utilizando tecnologia .NET,Net Core, padr�o',0,0,"J");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(130,20,'MVC Arquitretura modelo DDD, TDD desenvolvimento de testes automatizados',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2016-2018',0,0,"L");
// $pdf->Cell(140,20,'ALFADESIGN - S�o Jo�o Del Rei - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo : Analista de Suporte',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: Help desk
// Manuten��o em dados Firebird, Gerencia de sites',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2015',0,0,"L");
// $pdf->Cell(140,20,'GUIAMANIA - S�o Jo�o Del Rei - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo : Analista de Sistemas',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: Gerencia de sites
// Gerencia de dados MYSQL,Gera��o de Relatorios',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2011-2015',0,0,"L");
// $pdf->Cell(140,20,'VALE SA - Belo Horizonte - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo : Analista de Sistemas',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo:CONTR Cushman and Walkefield,Lyon Engenharia',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: Gest�o Financeira, Economica,dados ACESS,
// ORACLE, MYSQL, SAP: FN e PJ',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2010-2011',0,0,"L");
// $pdf->Cell(140,20,'Conselho Regional de Medicina Veterinaria -MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo :Suporte T�cnico',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: Est�gio ',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: :Manuten��o de site e suporte interno',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2009',0,0,"L");
// $pdf->Cell(140,20,'Funda��o Mariana Resende Costa FUMARC Brasil - Belo Horizonte - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo :Estudante Pesquisador',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: Est�gio ',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"J");
// $pdf->Cell(140,20,'Atividades: : Inicia��o Cient�fica Projeto Magnum Sol sob lideran�a de Gisele Brugger',0,0,"J");
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',12);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'2008-2009',0,0,"L");
// $pdf->Cell(140,20,'Pontif�cia Universidade Cat�lica de Minas Gerais - MG',0,0,"L");
// $pdf->Ln(15);
// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Cargo :Monitor e suporte',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Vinculo: Est�gio ',0,0,"L");
// $pdf->Ln(15);
// $pdf->Cell(130,20,'',0,0,"L");
// $pdf->Cell(140,20,'Atividades: :Monitor de Algoritmos e T�cnicas de programa��o C++, C#, Java',0,0,"J");
// $pdf->Ln(15);


// $pdf->Ln(20);
// /* FIM Experiencia Profissional*/

// /* Habilidades*/
// $pdf->SetFont('arial','B',20);
// $pdf->SetTextColor(70,130,180);
// $pdf->Cell(0,20,"Habilidades",0,0,'C');
// $pdf->Ln(30);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Administrativas: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'    Gest�o Economica, Financeira,Projetos',0,0,'L');
// $pdf->Ln(15);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Banco de dados: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'    SQL Server, MySQL,ORACLE,SAP,FireBird',0,0,'L');
// $pdf->Ln(15);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Programa��o: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'    PHP, Java, Javascript, HTML, C#, C++, Pascal',0,0,'L');
// $pdf->Ln(15);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Aplica��es: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Microsoft Project,Jude,Photoshop,Corel Draw',0,0,'L');
// $pdf->Ln(30);



// $pdf->SetFont('arial','B',20);
// $pdf->SetTextColor(70,130,180);
// $pdf->Cell(0,20,"Atividades Extra curriculares",0,0,'C');
// $pdf->Ln(30);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Nome: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Microsoft Student to Bussines',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Local: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Centro de Inova��o Microsoft PUC-MG S�o Gabriel',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Descri��o: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Curso de certifica��o de Infraestrutura de Redes Windows',0,0,'L');
// $pdf->Ln(15);


// $pdf->Ln(30);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Nome: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'      Inform�tica B�sica',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Local: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Infobyte Escola de Inform�tica - S�o Jo�o Del Rei - MG',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Descri��o: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Windows XP, Microsot Word, Microsoft Excel, Microsoft Power Point',0,0,'L');
// $pdf->Ln(15);

// $pdf->Ln(30);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Nome: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'      Web Design',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Local: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Infobyte Escola de Inform�tica - S�o Jo�o Del Rei - MG',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Descri��o: ",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     HTML, Adobe Flash, Dreamweaver, Corel Draw',0,0,'L');
// $pdf->Ln(15);

// $pdf->Ln(30);

// $pdf->SetFont('arial','B',20);
// $pdf->SetTextColor(70,130,180);
// $pdf->Cell(0,20,"Idiomas",0,0,'C');
// $pdf->Ln(30);
// $pdf->SetFont('arial','B',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Idioma ",0,0,'L');
// $pdf->setFont('arial','B',10);
// $pdf->Cell(0,20,'     Nivel',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Ingl�s",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     Avan�ado',0,0,'L');
// $pdf->Ln(15);

// $pdf->SetFont('arial','',10);
// $pdf->SetTextColor(256,256,256);
// $pdf->Cell(70,20,"Franc�s",0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(0,20,'     B�sico',0,0,'L');
// $pdf->Ln(15);


$pdf->Output("arquivo.pdf","I");
?>