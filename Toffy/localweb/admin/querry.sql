CREATE TABLE `gl_usuario` (
                            `codigo` int(11) NOT NULL AUTO_INCREMENT,
                            `login` varchar(50) NOT NULL,
                            `senha` varchar(255) NOT NULL,
                            `ativo` int(1) NOT NULL DEFAULT '1',
                            `ultimo_acesso` datetime DEFAULT NULL,
                            `perfil` int(11) DEFAULT NULL,
                            PRIMARY KEY (`codigo`)
) ;

CREATE TABLE `gl_perfil` (
                             `codigo` int(11) NOT NULL AUTO_INCREMENT,
                             `nome` varchar(255) DEFAULT NULL,
                             `permissao` text,
                             PRIMARY KEY (`codigo`)
) ;

CREATE TABLE `gl_menu` (
                           `codigo` int(11) NOT NULL AUTO_INCREMENT,
                           `id` varchar(255) NOT NULL,
                           `nome` varchar(255) NOT NULL,
                           `ordem` int(11) NOT NULL,
                           `pai` int(11) DEFAULT NULL,
                           PRIMARY KEY (`codigo`)
);

--senha admin
INSERT INTO `gl_usuario` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',1,NULL,1);
INSERT INTO `gl_usuario` VALUES (2,'convidado','d033e22ae348aeb5660fc2140aec35850c4da997',1,NULL,2);

INSERT INTO `gl_perfil` VALUES (1,'Administrador','1,2,3,4,5,6'),(2,'Integrantes','1');

INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (1,'000001','Início',1,0);
INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (2,'000002','Administrativo',1,0);
INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (3,'000003','Menus Gerenciador',1,2);
INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (4,'000004','Perfis',2,2);
INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (5,'000005','Usuários',3,2);
INSERT INTO `gl_menu` (codigo, id, nome, ordem, pai) VALUES (6,'000006','Permissões',4,2);

