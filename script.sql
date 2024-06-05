create database LojaCarros ;

create table login
(
    codlogin serial primary key,
    usuario varchar(80) not null,
    nome varchar(80) not null,
    email varchar(80) not null unique,
    telefone varchar(12) not null,
    senha varchar(80) not null
);

create table carro
(
    codcarro serial primary key,
    nomecarro varchar(80) not null,
    valor numeric(8,2) not null check(valor > 0),
    quantidade integer not null,
    descricao varchar(240)
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
    valor numeric (8,2) check (valor > 0),
    quantidade integer not null,
    primary key (codvenda_fk,codcarro_fk)
);