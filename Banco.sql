create database teste;

use teste;

create table empresa(
idEmpresa int(11) primary key auto_increment not null,
titulo varchar(50) not null,
telefone varchar(25) not null,
endereco varchar(80) not null,
cep varchar(12) not null,
cidade varchar (80) not null,
estado varchar(02) not null,
descricao varchar(100) not null,
idCategoria int not null);

create table categoria(
idCategoria int(11) primary key auto_increment not null,
nome varchar(50) not null);

Alter Table empresa add Constraint fk_empresa_categoria Foreign Key (idCategoria) References categoria (idCategoria);

insert into categoria(nome) values ('Eventos');
insert into categoria(nome) values ('Alimentação');
insert into categoria(nome) values ('Saúde');
insert into categoria(nome) values ('Esporte');
insert into categoria(nome) values ('Viagem');

insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('empresa1','1499999744','rua joaquim 213','17055648','bauru','sp','filial',1);
 
 insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('teste','1488779955','rua mariana 254','18077390','avare','sp','filial',3);
 
 insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('Joaquim Cruz Ltda','14966558779','rua adriana esteves 23','14557700','itai','sp','filial',4);
 
 insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('estrada de Sta cruz epp','1432775165','rua pedro josé 2153','17055648','taquarituba','sp','filial',2);
 
 insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('jardel gregorio me','1432659988','rua josé santana 453','17554499','cuiaba','MT','filial',1);
 
 insert into empresa(titulo,telefone,endereco,cep,cidade,estado,descricao,idcategoria)
 values ('marcenaria da maria','1426558877','rua joaquim 213','22554488','bauru','sp','filial',1);
 
 
 select * from empresa;
 
 select * From categoria
 
 select e.titulo,e.telefone,e.endereco,e.cep,e.cidade,e.descricao,c.nome as Categoria
 from empresa as e
 left join categoria as c on e.idCategoria = c.idCategoria;