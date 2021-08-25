create database dbPollera
go

use dbpollera
go

--Creacion De Tablas

--Tabla Control De Frituras
create table Tabla_Control_Frituras
(
	tot_fri int identity(1,1) not null primary key,
	cant_fri int not null,
	info_fritura varchar(60) not null,
	cant_comida int not null,
	nom_coc varchar(60) not null,
	hor_fri datetime not null,
	cam_rbd datetime not null,
	nom_cam_rbd varchar(60) not null
)
go

--Tabla Menu Productos
create table Tabla_Menu
(
	cod_menu int identity(1,1) not null primary key,
	nom_menu varchar(60) not null,
	pre_menu int not null,
	tip_prod varchar(9)
)
go

--Tabla Suministros
create table Tabla_Suministros
(
	cod_sum int identity(1,1) not null primary key,
	nom_sum varchar(60) not null,
	tip_sum varchar(9) not null,
	cant_inv int not null,
	elab_sum datetime not null,
	venc_sum datetime not null,
	rec_sum datetime not null,
	emp_rec varchar(30) not null
)
go

--Tabla Suministros Frios
create table Tabla_Suministros_Frios
(
	cod_sum int identity(1,1) not null primary key,
	nom_sum varchar(60) not null,
	cant_inv int not null,
	elab_sum datetime not null,
	venc_sum datetime not null,
	rec_sum datetime not null,
	emp_rec varchar(30) not null
)
go

--Tabla Suministros Secos
create table Tabla_Suministros_Secos
(
	cod_sum int identity(1,1) not null primary key,
	nom_sum varchar(60) not null,
	cant_inv int not null,
	elab_sum datetime not null,
	venc_sum datetime not null,
	rec_sum datetime not null,
	emp_rec varchar(30) not null
)
go

--Tabla Ventas
create table Tabla_Ventas
(
	factura int identity(1,1) not null primary key,
	fech_venta datetime not null,
	nom_emp varchar(30) not null,
	coor_resp varchar(30) not null,
	cant_vend int not null,
	det_ven varchar(60) not null,
	tot_venta decimal(10,2) not null
)
go

--Tabla Empleados
create table Tabla_Empleados
(
	cod_emp int identity(1,1) not null primary key,
	nom_emp varchar(30) not null,
	ape_emp varchar(30) not null,
	res_emp varchar(30),
	hor_emp varchar(9) not null,
	cant_ventas int not null,
	cant_din_ventas decimal(10,2)
)
go

--Tabla Usuarios
create table Tabla_Usuarios
(
	cod_emp int identity(1,1) not null primary key,
	nom_emp varchar(30) not null,
	ape_emp varchar(30) not null,
	tip_usu varchar(15) not null,
	usu_emp varchar(60) not null,
	con_usu varchar(60) not null
)
go

--Tabla Pedidos
create table Tabla_Pedidos
(
	num_ped int identity(1,1) not null primary key,
	nom_sum varchar(30) not null,
	fecha datetime not null,
	tip_sum varchar(9) not null,
	cant_soli int not null, 
	enc_pedido varchar(30) not null
)
go

--Tabla Recepcion De Pedidos
create table Tabla_Recepcion_Pedidos
(
	num_ped int identity(1,1) not null primary key,
	nom_sum varchar(30) not null,
	fecha datetime not null,
	tip_sum varchar(9) not null,
	cant_reci int not null, 
	enc_recepcion varchar(30) not null,
	tot_gasto decimal(10,2) not null
)
go

--Tabla Registro De Compras
create table Tabla_Registro_Compras
(
	num_com int identity(1,1) not null primary key,
	nom_art varchar(30) not null,
	fecha datetime not null,
	tot_gast decimal(10,2) not null,
	enc_compra varchar(30) not null
)
go

--Tabla Control De Gastos
create table Tabla_Control_Gastos
(
	num_gast int identity(1,1) not null primary key,
	tot_gast decimal(10,2) not null
)
go

-- Configuracion Formato Fechas (Dia,Mes,Año)
set dateformat dmy;

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Control Frituras
create proc SP_ControlFrituras
(
@cant_fri int,
@info_fritura varchar(60),
@cant_comida int,
@nom_coc varchar(60),
@hor_fri datetime,
@cam_rbd datetime,
@nom_cam_rbd varchar(60),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Control_Frituras values (@cant_fri,@info_fritura,@cant_comida,@nom_coc,@hor_fri,@cam_rbd,@nom_cam_rbd)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Control_Frituras set cant_fri=@cant_fri,info_fritura=@info_fritura,cant_comida=@cant_comida,nom_coc=@nom_coc,hor_fri=@hor_fri,cam_rbd=@cam_rbd,nom_cam_rbd=@nom_cam_rbd
where cant_fri=@cant_fri
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Control_Frituras
where cant_fri=@cant_fri
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Menu Productos
create proc SP_Menu
(
@nom_menu varchar(60),
@pre_menu int,
@tip_prod varchar(9),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Menu values (@nom_menu,@pre_menu,@tip_prod)
end
--Actualizacion
if @modo='A'
begin
update Tabla_menu set nom_menu=@nom_menu,pre_menu=@pre_menu,tip_prod=@tip_prod
where nom_menu=@nom_menu
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_menu
where nom_menu=@nom_menu
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Suministros
create proc SP_Suministros
(
@nom_sum varchar(60),
@tip_sum varchar(9),
@cant_inv int,
@elab_sum datetime,
@venc_sum datetime,
@rec_sum datetime,
@emp_rec varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Suministros values (@nom_sum,@tip_sum,@cant_inv,@elab_sum,@venc_sum,@rec_sum,@emp_rec)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Suministros set nom_sum=@nom_sum,tip_sum=@tip_sum,cant_inv=@cant_inv,elab_sum=@elab_sum,venc_sum=@venc_sum,rec_sum=@rec_sum,emp_rec=@emp_rec
where nom_sum=@nom_sum
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Suministros
where nom_sum=@nom_sum
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Suministros Frios
create proc SP_Suministros_Frios
(
@nom_sum varchar(60),
@cant_inv int,
@elab_sum datetime,
@venc_sum datetime,
@rec_sum datetime,
@emp_rec varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Suministros_Frios values (@nom_sum,@cant_inv,@elab_sum,@venc_sum,@rec_sum,@emp_rec)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Suministros_Frios set nom_sum=@nom_sum,cant_inv=@cant_inv,elab_sum=@elab_sum,venc_sum=@venc_sum,rec_sum=@rec_sum,emp_rec=@emp_rec
where nom_sum=@nom_sum
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Suministros_Frios
where nom_sum=@nom_sum
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Suministros Secos
create proc SP_Suministros_Secos
(
@nom_sum varchar(60),
@cant_inv int,
@elab_sum datetime,
@venc_sum datetime,
@rec_sum datetime,
@emp_rec varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Suministros_Secos values (@nom_sum,@cant_inv,@elab_sum,@venc_sum,@rec_sum,@emp_rec)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Suministros_Secos set nom_sum=@nom_sum,cant_inv=@cant_inv,elab_sum=@elab_sum,venc_sum=@venc_sum,rec_sum=@rec_sum,emp_rec=@emp_rec
where nom_sum=@nom_sum
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Suministros_Secos
where nom_sum=@nom_sum
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Ventas
create proc SP_Ventas
(
@fech_venta datetime,
@nom_emp varchar(30),
@coor_resp varchar(30),
@cant_vend int,
@det_ven varchar(60),
@tot_venta decimal(10,2),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Ventas values (@fech_venta,@nom_emp,@coor_resp,@cant_vend,@det_ven,@tot_venta)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Ventas set fech_venta=@fech_venta,nom_emp=@nom_emp,coor_resp=@coor_resp,cant_vend=@cant_vend,det_ven=@det_ven,tot_venta=@tot_venta
where fech_venta=@fech_venta
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Ventas
where fech_venta=@fech_venta
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Empleados
create proc SP_Empleados
(
@nom_emp varchar(30),
@ape_emp varchar(30),
@res_emp varchar(30),
@hor_emp varchar(9),
@cant_ventas int,
@cant_din_ventas decimal(10,2),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Empleados values (@nom_emp,@ape_emp,@res_emp,@hor_emp,@cant_ventas,@cant_din_ventas)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Empleados set nom_emp=@nom_emp,ape_emp=@ape_emp,res_emp=@res_emp,hor_emp=@hor_emp,cant_ventas=@cant_ventas,cant_din_ventas=@cant_din_ventas
where nom_emp=@nom_emp
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Empleados
where nom_emp=@nom_emp
end
go


-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Usuarios
create proc SP_Usuarios
(
@nom_emp varchar(30),
@ape_emp varchar(30),
@tip_usu varchar(15),
@usu_emp varchar(60),
@con_usu varchar(60),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Usuarios values (@nom_emp,@ape_emp,@tip_usu,@usu_emp,@con_usu)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Usuarios set nom_emp=@nom_emp,ape_emp=@ape_emp,tip_usu=@tip_usu,usu_emp=@usu_emp,con_usu=@con_usu
where nom_emp=@nom_emp
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Usuarios
where nom_emp=@nom_emp
end
go


-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Pedidos
create proc SP_Pedidos
(
@nom_sum varchar(30),
@fecha datetime,
@tip_sum varchar(9),
@cant_soli int, 
@enc_pedido varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Pedidos values (@nom_sum,@fecha,@tip_sum,@cant_soli,@enc_pedido)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Pedidos set nom_sum=@nom_sum,fecha=@fecha,tip_sum=@tip_sum,cant_soli=@cant_soli,enc_pedido=@enc_pedido
where nom_sum=@nom_sum
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Pedidos
where nom_sum=@nom_sum
end
go


-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Recepcion De Pedidos
create proc SP_Recepcion_Pedidos
(
@nom_sum varchar(30),
@fecha datetime,
@tip_sum varchar(9),
@cant_reci int, 
@enc_recepcion varchar(30),
@tot_gasto decimal(10,2),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Recepcion_Pedidos values (@nom_sum,@fecha,@tip_sum,@cant_reci,@enc_recepcion,@tot_gasto)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Recepcion_Pedidos set nom_sum=@nom_sum,fecha=@fecha,tip_sum=@tip_sum,cant_reci=@cant_reci,enc_recepcion=@enc_recepcion,tot_gasto=@tot_gasto
where nom_sum=@nom_sum
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Recepcion_Pedidos
where nom_sum=@nom_sum
end
go

-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Registro De Compras
create proc SP_Registro_Compras
(
@nom_art varchar(30),
@fecha datetime,
@tot_gast decimal(10,2),
@enc_compra varchar(30),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Registro_Compras values (@nom_art,@fecha,@tot_gast,@enc_compra)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Registro_Compras set nom_art=@nom_art,fecha=@fecha,tot_gast=@tot_gast,enc_compra=@enc_compra
where nom_art=@nom_art
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Registro_Compras
where nom_art=@nom_art
end
go


-- Creacion Procedimiento Almacenado Para Mantenimiento Tabla Control De Gastos
create proc SP_Control_Gastos
(
@tot_gast decimal(10,2),
@modo char(1)
)
as
--Inserccion
if @modo='I'
begin
insert into Tabla_Control_Gastos values (@tot_gast)
end
--Actualizacion
if @modo='A'
begin
update Tabla_Control_Gastos set tot_gast=@tot_gast
where tot_gast=@tot_gast
end
--Eliminacion
if @modo='E'
begin 
delete from Tabla_Control_Gastos
where tot_gast=@tot_gast
end
go
