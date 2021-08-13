create database Pollera
go

use Pollera
go

create table control_RBD_Frituras
(
	ID int identity(1,1) not null primary key,
	Dia datetime not null,
	pie_pollo int not null,
	por_papas int not null,
	fri_extras varchar(20) not null,
	tot_fritura int not null,
	acum int not null,
	cam_rbd datetime,
	sac_emp int
)
go

create table controles
(
	ID int identity(1,1) primary key,
	factura varchar(20) not null,
	alim_elab varchar(10) not null,
	alim_entr varchar(10) not null,
	coor_resp varchar(10) not null,
	tel_cont varchar(9) not null,
	fecha datetime,
	hor_elab time,
	hor_desp time,
	hor_entr time
)
go

create table recepcion_pedidos
(
	ID int identity(1,1) primary key,
	num_pedido int,
	dia	varchar(10),
	fecha datetime,
	prod varchar(30) not null,
	cant int not null,
	peso decimal(10,2),
	vencimiento datetime
)
go

create table pedidos
(
ID int identity(1,1)primary key,
cant_soli int not null,
cant_reci int not null
)
go

create table control_mensual
(
ID  int identity(1,1)primary key,
cod_emp int not null,
Nom_emp varchar(30) not null,
Tur_emp varchar(30) not null,
Tel_emp varchar(30) not null
)
go

create table controle_pollo_refrigerado
(
ID int identity(1,1)primary key,
Nom_emp varchar(30) not null,
fecha datetime,
prod varchar(30) not null,
inv_am int not null,
ing int not null,
inv_pm int not null,
dif int
)
go

create table refrescos
(
ID int identity(1,1)primary key,
Nom_emp varchar(30)not null,
fecha varchar(30)not null,
prod varchar(30)not null,
inv_am int not null,
ing int not null,
inv_pm int not null,
dif int
)
go

set dateformat dmy;

insert into control_RBD_Frituras (Dia, pie_pollo, por_papas, fri_extras, tot_fritura, acum, cam_rbd, sac_emp)
values ('11-08-2021', '2', '4', 'Nuggets', '2','3', '13-08-2021','4')

select * from control_RBD_Frituras

insert into controles (factura, alim_elab, alim_entr, coor_resp, tel_cont, fecha, hor_elab, hor_desp, hor_entr)
values ('Num1', 'Iris', 'Roger', 'Sonia', '9954-1290', '12-09-2021','02:50','03:15','03:45')

select * from controles

insert into recepcion_pedidos(num_pedido, dia, fecha, prod, cant, peso, vencimiento)
values ('01', 'Lunes', '12-08-2021', 'Pollo Marinado', '5', '2.01', '12-12-2021')

select * from recepcion_pedidos

insert into pedidos (cant_soli, cant_reci)
values ('20', '30')

select * from pedidos

insert into control_mensual (cod_emp, Nom_emp, Tur_emp, Tel_emp)
values ('01','Jose','AM','9780-2345')

select * from control_mensual

insert into controle_pollo_refrigerado(Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-2021', 'Papas', '284', '0', '260', '24')

select * from controle_pollo_refrigerado

insert into refrescos (Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-21', 'Te Lipton', '1', '0', '0', '1')

select * from refrescos


