create database LojaCarros ;

create table login
(
    codlogin serial primary key,
    usuario varchar(80) not null unique,
    nome varchar(80) not null,
    email varchar(80) not null unique,
    telefone varchar(12) not null,
    senha varchar(256) not null
);

create table carro
(
    codcarro serial primary key,
    nomecarro varchar(80) not null,
    valor numeric(15,2) not null check(valor > 0),
    quantidade integer not null,
    descricao varchar(240),
    img varchar(80)
);

create table venda
(
    codvenda serial primary key,
    codlogin_fk integer references login(codlogin) ON DELETE CASCADE ON UPDATE CASCADE,
    datavenda date 
    
);

create table itensvendacarro
(
    codvenda_fk integer references venda(codvenda) ON DELETE CASCADE ON UPDATE CASCADE,
    codcarro_fk integer references carro(codcarro) ON DELETE CASCADE ON UPDATE CASCADE,
    valor numeric (15,2) check (valor > 0),
    quantidade integer not null,
    primary key (codvenda_fk,codcarro_fk)
);

insert into carro(nomecarro,valor,quantidade,descricao,img) values (upper("camarro v8"), 200000.00, 10, "Um carro muito bom para se dirigir !","CamaroAmarelo.jpg");
insert into carro(nomecarro,valor,quantidade,descricao,img) values (upper("Porsh 911"), 220000.00, 10, "Um carro muito Confiavel!", "porsche-911.webp");v
insert into carro(nomecarro,valor,quantidade,descricao,img) values (upper("Viper v10"), 300000.00, 50, "Um carro muito Confiavel!", "viperv10.jpg");
insert into carro(nomecarro,valor,quantidade,descricao,img) values (upper("f150 shelby super snake"), 1200000.00, 3, "A melhor camionete sportiva!", "f150shelby.avif");