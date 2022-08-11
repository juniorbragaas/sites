
<?
require_once("pdf/fpdf/fpdf.php");
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y H:i');
$frase = 'Atualizado '.$data;
 
$pdf= new FPDF("P","pt","A4");
 
$pdf->AddPage();
$pdf->SetFont('arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,0,$frase,0,1,'C');
$pdf->Ln(1);
$pdf->SetFont('arial','B',30);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,30,"Meu Currículo",0,1,'C');
$pdf->Ln(15);


//email
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Dados Pessoais",0,0,'C');
$pdf->Ln(15);

//nome
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Nome:",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'Valdelei Junior Braga',0,1,'L');

//telefone
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Telefone:",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'32998243601',0,1,'L');

//whatsapp
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Whatsapp:",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'32998243601',0,1,'L');
 
//email
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"E-mail:",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(70,20,'junior.braga.as@gmail.com',0,1,'L');
 
//Endereço
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Endereço:",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(70,20,'Rua Carlos Alves, 273, Matosinhos, São João Dei Rei - MG',0,1,'L');

$pdf->Ln(15);
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Resumo",0,0,'C');
$pdf->Ln(30);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'Profissional com mais de 10 anos de experiencia no desenvolvimento de software e sites ',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'Trabalhos com sistema web, portais e servicos utilizando metodologias ageis. Facilidade de ',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'aprendizado, suporte e treinamento de equipes.',0,0,"L");
$pdf->Ln(15);$pdf->Cell(130,20,'Disponibilidade imediata para mudança e viagens.',0,0,"L");
$pdf->Ln(15);


$pdf->Ln(15);
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Formação Acadêmica",0,0,'C');
$pdf->Ln(30);

/* Formacao Academica*/
$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2018-Atual',0,0,"L");
$pdf->Cell(140,20,'UNOPAR-PR',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Curso : Gestão de Projetos',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Tipo: Pós Graduação/MBA EAD',0,0,"L");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2008-2015',0,0,"L");
$pdf->Cell(140,20,'Pontifícia Universidade Católica de Minas Gerais (PUC-MG)',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Curso : Sistemas de Informação',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Tipo: Bacharelado',0,0,"L");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2006-2018',0,0,"L");
$pdf->Cell(140,20,'Pontifícia Universidade Católica de Minas Gerais (PUC-MG)',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Curso : Tecnologia em Jogos Digitais',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Tipo: Tecnologo',0,0,"L");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2004-2006',0,0,"L");
$pdf->Cell(140,20,'Instituto Federal Sudeste de Minas Gerais Barbacena - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Curso : Programador',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Tipo: Tècnico',0,0,"L");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'1999-2001',0,0,"L");
$pdf->Cell(140,20,'Escola Estadual Cônego Osvaldo Lustosa São Jõao Del Rei - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Curso : Ensino Médio Regular',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Tipo: Ensino Médio',0,0,"L");
$pdf->Ln(30);
/* FIM Formacao Academica*/


/* Experiencia Profissional*/
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Experiência Profissional",0,0,'C');
$pdf->Ln(30);


$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2018-2019',0,0,"L");
$pdf->Cell(140,20,'SQUADRA TECNOLOGIA - Belo Horizonte - MG / Lavras - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo : Analista Desenvolvedor',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: Desenvolvimento utilizando tecnologia .NET,Net Core, padrão',0,0,"J");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(130,20,'MVC Arquitretura modelo DDD, TDD desenvolvimento de testes automatizados',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2016-2018',0,0,"L");
$pdf->Cell(140,20,'ALFADESIGN - São João Del Rei - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo : Analista de Suporte',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: Help desk
Manutenção em dados Firebird, Gerencia de sites',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2015',0,0,"L");
$pdf->Cell(140,20,'GUIAMANIA - São João Del Rei - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo : Analista de Sistemas',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: CLT',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: Gerencia de sites
Gerencia de dados MYSQL,Geração de Relatorios',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2011-2015',0,0,"L");
$pdf->Cell(140,20,'VALE SA - Belo Horizonte - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo : Analista de Sistemas',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo:CONTR Cushman and Walkefield,Lyon Engenharia',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: Gestão Financeira, Economica,dados ACESS,
ORACLE, MYSQL, SAP: FN e PJ',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2010-2011',0,0,"L");
$pdf->Cell(140,20,'Conselho Regional de Medicina Veterinaria -MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo :Suporte Técnico',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: Estágio ',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: :Manutenção de site e suporte interno',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2009',0,0,"L");
$pdf->Cell(140,20,'Fundação Mariana Resende Costa FUMARC Brasil - Belo Horizonte - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo :Estudante Pesquisador',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: Estágio ',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"J");
$pdf->Cell(140,20,'Atividades: : Iniciação Científica Projeto Magnum Sol sob liderança de Gisele Brugger',0,0,"J");
$pdf->Ln(15);

$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'2008-2009',0,0,"L");
$pdf->Cell(140,20,'Pontifícia Universidade Católica de Minas Gerais - MG',0,0,"L");
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Cargo :Monitor e suporte',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Vinculo: Estágio ',0,0,"L");
$pdf->Ln(15);
$pdf->Cell(130,20,'',0,0,"L");
$pdf->Cell(140,20,'Atividades: :Monitor de Algoritmos e Técnicas de programação C++, C#, Java',0,0,"J");
$pdf->Ln(15);


$pdf->Ln(20);
/* FIM Experiencia Profissional*/

/* Habilidades*/
$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Habilidades",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Administrativas: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'    Gestão Economica, Financeira,Projetos',0,0,'L');
$pdf->Ln(15);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Banco de dados: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'    SQL Server, MySQL,ORACLE,SAP,FireBird',0,0,'L');
$pdf->Ln(15);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Programação: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'    PHP, Java, Javascript, HTML, C#, C++, Pascal',0,0,'L');
$pdf->Ln(15);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Aplicações: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Microsoft Project,Jude,Photoshop,Corel Draw',0,0,'L');
$pdf->Ln(30);



$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Atividades Extra curriculares",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Nome: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Microsoft Student to Bussines',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Local: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Centro de Inovação Microsoft PUC-MG São Gabriel',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Descrição: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Curso de certificação de Infraestrutura de Redes Windows',0,0,'L');
$pdf->Ln(15);


$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Nome: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'      Informática Básica',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Local: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Infobyte Escola de Informática - São João Del Rei - MG',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Descrição: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Windows XP, Microsot Word, Microsoft Excel, Microsoft Power Point',0,0,'L');
$pdf->Ln(15);

$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Nome: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'      Web Design',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Local: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Infobyte Escola de Informática - São João Del Rei - MG',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Descrição: ",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     HTML, Adobe Flash, Dreamweaver, Corel Draw',0,0,'L');
$pdf->Ln(15);

$pdf->Ln(30);

$pdf->SetFont('arial','B',20);
$pdf->SetTextColor(70,130,180);
$pdf->Cell(0,20,"Idiomas",0,0,'C');
$pdf->Ln(30);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Idioma ",0,0,'L');
$pdf->setFont('arial','B',10);
$pdf->Cell(0,20,'     Nivel',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Inglês",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Avançado',0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,20,"Francês",0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(0,20,'     Básico',0,0,'L');
$pdf->Ln(15);


$pdf->Output("arquivo.pdf","I");
?>