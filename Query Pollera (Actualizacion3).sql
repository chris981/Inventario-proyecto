create database Pollera
go

use Pollera
go

--Creacion De Tablas

--Tabla Control De Frituras
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

--Creacion Tabla Controles De Venta
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

--Creacion Tabla Recepcion De Pedidos
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

--Creacion Tabla De Pedidos
create table pedidos
(
ID int identity(1,1)primary key,
prod varchar(30) not null,
cant_soli int not null,
cant_reci int not null
)
go

--Creacion Tabla De Controles Mensuales
create table control_mensual
(
ID  int identity(1,1)primary key,
cod_emp int not null,
Nom_emp varchar(30) not null,
Tur_emp varchar(30) not null,
Tel_emp varchar(30) not null
)
go

--Creacion Tabla Control Suministros Congelados
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

--Creacion Tabla Control De Refrescos
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

-- Configuracion Formato Fechas (Dia,Mes,Año)
set dateformat dmy;

--Prueba Insercion De Datos En Tabla Control Frituras
insert into control_RBD_Frituras (Dia, pie_pollo, por_papas, fri_extras, tot_fritura, acum, cam_rbd, sac_emp)
values ('11-08-2021', '2', '4', 'Nuggets', '2','3', '13-08-2021','4')

--Prueba Impresion De Datos Insertados Control Frituras
select * from control_RBD_Frituras

--Prueba Insercion De Datos En Tabla Controles De Venta
insert into controles (factura, alim_elab, alim_entr, coor_resp, tel_cont, fecha, hor_elab, hor_desp, hor_entr)
values ('Num1', 'Iris', 'Roger', 'Sonia', '9954-1290', '12-09-2021','02:50','03:15','03:45')

--Prueba Impresion De Datos Insertados En Tabla Controles De venta
select * from controles

--Prueba Insercion De Datos En Tabla Recepcion De Pedidos
insert into recepcion_pedidos(num_pedido, dia, fecha, prod, cant, peso, vencimiento)
values ('01', 'Lunes', '12-08-2021', 'Pollo Marinado', '5', '2.01', '12-12-2021')

--Prueba Impresion De Datos Insertados En Tabla Recepcion De Pedidos
select * from recepcion_pedidos

--Prueba Insercion De Datos En Tabla Pedidos
insert into pedidos (cant_soli, cant_reci)
values ('20', '30')

--Prueba Impresion De Datos En Tabla Pedidos
select * from pedidos

--Prueba Insercion De Datos En Tabla Controles Mensuales
insert into control_mensual (cod_emp, Nom_emp, Tur_emp, Tel_emp)
values ('01','Jose','AM','9780-2345')

--Prueba Impresion De Datos En Tabla Controles Mensuales
select * from control_mensual

--Prueba Insercion De Datos En Tabla Control Congelados
insert into controle_pollo_refrigerado(Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-2021', 'Papas', '284', '0', '260', '24')

--Prueba Impresion De Datos En Tabla Control Congelados
select * from controle_pollo_refrigerado

--Prueba Inserrcion De Datos En Tabla Refrescos
insert into refrescos (Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-21', 'Te Lipton', '1', '0', '0', '1')

--Prueba Impresion De Datos En Tabla Refrescos
select * from refrescos

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Control Frituras
create proc SP_ControlFrituras
(
@Dia datetime,
@pie_pollo int,
@por_papas int,
@fri_extras varchar(20),
@tot_fritura int,
@acum int,
@cam_rbd datetime,
@sac_emp int,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into control_RBD_Frituras values (@dia, @pie_pollo, @por_papas,@fri_extras,@tot_fritura,@acum,@cam_rbd,@sac_emp)
end
--Actualizacion
if @modo='A'
begin
update control_RBD_Frituras set Dia=@dia,pie_pollo=@pie_pollo,por_papas=@por_papas,fri_extras=@fri_extras,tot_fritura=@tot_fritura,acum=@acum,cam_rbd=@cam_rbd,sac_emp=@sac_emp
where Dia=@dia
end
--Eliminacion
if @modo='E'
begin 
delete from control_RBD_Frituras
where dia=@dia
end
go

--Ejecucion Del Procedimiento Almacenado Para Ingresaer Datos En Tabla Control Frituras

--Inserta
exec SP_ControlFrituras '11-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'I'

--Actualiza
exec SP_ControlFrituras '14-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'A'

--Elimina
exec SP_ControlFrituras '14-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'E'
select * from control_RBD_Frituras

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Controles Ventas
create proc SP_ControlVentas
(
@factura varchar(20),
@alim_elab varchar(10),
@alim_entr varchar(10),
@coor_resp varchar(10),
@tel_cont varchar(9),
@fecha datetime,
@hor_elab time,
@hor_desp time,
@hor_entr time,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into controles values (@factura,@alim_elab,@alim_entr,@coor_resp,@tel_cont,@fecha,@hor_elab,@hor_desp,@hor_entr)
end
--Actualizacion
if @modo='A'
begin
update controles set factura=@factura,alim_elab=@alim_elab,alim_entr=@alim_entr,coor_resp=@coor_resp,tel_cont=@tel_cont,fecha=@fecha,hor_elab=@hor_elab,hor_desp=@hor_desp,hor_entr=@hor_entr
where factura=@factura
end
--Eliminacion
if @modo='E'
begin 
delete from controles
where factura=@factura
end
go

--Ejecucion Del Procedimiento Almacenado Para Ingresaer Datos En Tabla Control Ventas

--Inserta
exec SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9964-1293', '14-09-2021','04:50','05:15','05:45', 'I'

--Actualiza
exec SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9784-1293', '14-09-2021','04:50','05:15','05:45', 'A'

--Elimina
exec SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9784-1293', '14-09-2021','04:50','05:15','05:45', 'E'
select * from controles

--Creacion Procedimiento Almacenado Para Mantenimiento De La Tabla Recepcion De Pedidos
create proc SP_RecepcionPedidos
(
@num_pedido int,
@dia varchar(10),
@fecha datetime,
@prod varchar(30),
@cant int,
@peso decimal(10,2),
@vencimiento datetime,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into recepcion_pedidos values (@num_pedido,@dia,@fecha,@prod,@cant,@peso,@vencimiento)
end
--Actualizacion
if @modo='A'
begin
update recepcion_pedidos set num_pedido=@num_pedido,dia=@dia,fecha=@fecha,prod=@prod,cant=@cant,peso=@peso,vencimiento=@vencimiento
where num_pedido=@num_pedido
end
--Eliminacion
if @modo='E'
begin 
delete from recepcion_pedidos
where num_pedido=@num_pedido
end
go

--Inserta
exec SP_RecepcionPedidos 02, 'Martes', '12-08-2021', 'Refrescos', 5, 2.01, '12-12-2021', 'I'

--Actualiza
exec SP_RecepcionPedidos 02, 'Miercoles', '16-08-2021', 'Empanizador', 5, 2.01, '12-12-2021', 'A'

--Elimina
exec SP_RecepcionPedidos 01, 'Lunes', '12-08-2021', 'Pollo Marinado', 5, 2.01, '12-12-2021', 'E'

select * from recepcion_pedidos

--Creacion Procedimiento Almacenado Para Mantenimiento De La Tabla  De Pedidos
create proc SP_Pedidos
(
@prod varchar(30),
@cant_soli int,
@cant_reci int,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into pedidos values (@prod,@cant_soli,@cant_reci)
end
--Actualizacion
if @modo='A'
begin
update pedidos set prod=@prod,cant_soli=@cant_soli,cant_reci=@cant_reci
where prod=@prod
end
--Eliminacion
if @modo='E'
begin 
delete from pedidos
where prod=@prod
end
go

--Inserta
exec SP_Pedidos 'Alas De Pollo',25, 12, 'I'

--Actualiza
exec SP_Pedidos 'Papas',15, 12, 'A'

--Elimina
exec SP_Pedidos 'Refrescos',5, 2, 'E'

select * from pedidos

--Creacion Procedimiento Almacenado Para Mantenimiento De La Tabla Controles Mensuales
create proc SP_ControlMensual
(
@cod_emp int,
@Nom_emp varchar(30),
@Tur_emp varchar(30),
@Tel_emp varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into control_mensual values (@cod_emp,@Nom_emp,@Tur_emp,@Tel_emp)
end
--Actualizacion
if @modo='A'
begin
update control_mensual set cod_emp=@cod_emp,Nom_emp=@Nom_emp,Tur_emp=@Tur_emp,Tel_emp=@Tel_emp
where cod_emp=@cod_emp
end
--Eliminacion
if @modo='E'
begin 
delete from control_mensual
where cod_emp=@cod_emp
end
go

--Inserta
exec SP_ControlMensual 02,'Jose','AM','9780-2345','I'

--Actualiza
exec SP_ControlMensual 02,'Estiven','PM','9720-2440','A'

--Elimina
exec SP_ControlMensual 01,'Jose','AM','9780-2345','E'

select * from control_mensual

--Creacion Procedimiento Almacenado Para Mantenimiento De La Tabla Suministros Congelados
create proc SP_SuministrosCongelados
(
@Nom_emp varchar(30),
@fecha datetime,
@prod varchar(30),
@inv_am int,
@ing int,
@inv_pm int,
@dif int,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into controle_pollo_refrigerado values (@Nom_emp,@fecha,@prod,@inv_am,@ing,@inv_pm,@dif)
end
--Actualizacion
if @modo='A'
begin
update controle_pollo_refrigerado set Nom_emp=@Nom_emp,fecha=@fecha,prod=@prod,inv_am=@inv_am,ing=@ing,inv_pm=@inv_pm,dif=@dif
where Nom_emp=@Nom_emp
end
--Eliminacion
if @modo='E'
begin 
delete from controle_pollo_refrigerado
where Nom_emp=@Nom_emp
end
go

--Inserta
exec SP_SuministrosCongelados 'Rafael', '16-08-2021', 'Pollo', 288, 0, 260, 28,'I'

--Actualiza
exec SP_ControlMensual 02,'Estiven','PM','9720-2440','A'

--Elimina
exec SP_ControlMensual 01,'Jose','AM','9780-2345','E'

select * from controle_pollo_refrigerado

--Creacion Procedimiento Almacenado Para Mantenimiento De La Tabla Suministros Congelados
create proc SP_Refrescos
(
@Nom_emp varchar(30),
@fecha datetime,
@prod varchar(30),
@inv_am int,
@ing int,
@inv_pm int,
@dif int,
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into refrescos values (@Nom_emp,@fecha,@prod,@inv_am,@ing,@inv_pm,@dif)
end
--Actualizacion
if @modo='A'
begin
update refrescos set Nom_emp=@Nom_emp,fecha=@fecha,prod=@prod,inv_am=@inv_am,ing=@ing,inv_pm=@inv_pm,dif=@dif
where Nom_emp=@Nom_emp
end
--Eliminacion
if @modo='E'
begin 
delete from refrescos
where Nom_emp=@Nom_emp
end
go

--Inserta
exec SP_Refrescos 'Rafael', '16-08-2021', '/up', 288, 0, 260, 28,'I'

--Actualiza
exec SP_Refrescos 'Rafael', '16-08-2021', '7up', 288, 0, 260, 28,'A'

--Elimina
exec SP_Refrescos 'Rafael', '16-08-2021', '/up', 288, 0, 260, 28,'E'

select * from refrescos

