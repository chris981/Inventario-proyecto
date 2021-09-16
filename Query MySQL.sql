create database dbPollera;
 

use dbpollera;
 

-- Creacion De Tablas

--  SQLINES DEMO *** rituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Control_Frituras
(
	cod_fritura int auto_increment not null primary key,
	cant_fri int not null,
	cod_emp int,
	hor_fri datetime(3),
	cam_rbd datetime(3),
	cod_emp_cam int,
	cod_fre int
	);

-- Tabla Menu Productos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Menu
(
	cod_menu int auto_increment not null primary key,
	nom_menu varchar(60) not null,
	pre_menu int not null,
	tip_prod varchar(9)
);

-- Tabla Suministros
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Suministros
(
	cod_sum int auto_increment not null primary key,
	nom_sum varchar(60) not null,
	tip_sum varchar(9) not null,
	cant_inv int not null,
	elab_sum datetime(3) not null,
	venc_sum datetime(3) not null,
	rec_sum datetime(3) not null,
	cod_emp int
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tipo_Suministros
(
	cod_sum int auto_increment not null primary key,
	nom_sum varchar(60) not null
);

-- Tabla Ventas
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Ventas
(
	factura int auto_increment not null primary key,
	fech_venta datetime(3) not null,
	cod_emp int not null,
	cant_vend int not null,
	tot_venta decimal(10,2) not null
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Detalle_ventas
(
	factura int auto_increment not null primary key,
	cod_sum int,
	cod_menu int
);


-- Tabla Empleados
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Empleados
(
	cod_emp int auto_increment not null primary key,
	usu_emp varchar(30) not null,
	cont_emp varchar(30) not null,
	nom_emp varchar(30) not null,
	ape_emp varchar(30) not null,
	res_emp varchar(30),
	hor_emp varchar(9) not null,
	cant_ventas int not null,
	cant_din_ventas decimal(10,2)
);


-- Tabla Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Solicitud_Pedidos
(
	num_ped int auto_increment not null primary key,
	nom_sum varchar(30) not null,
	fecha datetime(3) not null,
	tip_sum varchar(9) not null,
	cant_soli int not null, 
	cod_emp int
);

--  SQLINES DEMO ***  Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Recepcion_Pedidos
(
	num_ped int auto_increment not null primary key,
	fecha datetime(3) not null,
	cant_reci int not null, 
	cod_emp int not null,
	tot_gasto decimal(10,2) not null
);

--  SQLINES DEMO *** Compras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Registro_Compras
(
	num_com int auto_increment not null primary key,
	nom_art varchar(30) not null,
	fecha datetime(3) not null,
	tot_gast decimal(10,2) not null,
	cod_emp int
);

-- Tabla Freidoras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Freidoras
(
	cod_fre int auto_increment not null primary key,
	info_fre varchar(30) not null
);

-- SQLINES DEMO *** mato Fechas (Dia,Mes,Año)


-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Control Frituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_ControlFrituras
(
p_cod_fritura int,
p_cant_fri int,
p_cod_emp int,
p_hor_fri datetime(3),
p_cam_rbd datetime(3),
p_cod_emp_cam int,
p_cod_fre int,
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Control_Frituras(cant_fri,cod_emp,hor_fri,cam_rbd,cod_emp_cam,cod_fre) values (p_cant_fri,p_cod_emp,p_hor_fri,p_cam_rbd,p_cod_emp_cam,p_cod_fre);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Control_Frituras set cant_fri=p_cant_fri,cod_emp=p_cod_emp,hor_fri=p_hor_fri,cam_rbd=p_cam_rbd,cod_emp_cam=p_cod_emp_cam,cod_fre=p_cod_fre
where cod_fritura=p_cod_fritura;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Control_Frituras
where cod_fritura=p_cod_fritura;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Menu Productos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Menu
(
p_cod_menu int,
p_nom_menu varchar(60),
p_pre_menu int,
p_tip_prod varchar(9), 
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Menu(nom_menu,pre_menu,tip_prod) values (p_nom_menu,p_pre_menu,p_tip_prod);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_menu set nom_menu=p_nom_menu,pre_menu=p_pre_menu,tip_prod=p_tip_prod
where cod_menu=p_cod_menu;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_menu
where cod_menu=p_cod_menu;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Suministros
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Suministros
(
p_cod_sum int,
p_nom_sum varchar(60),
p_tip_sum varchar(9),
p_cant_inv int,
p_elab_sum datetime(3),
p_venc_sum datetime(3),
p_rec_sum datetime(3),
p_cod_emp int,
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Suministros(nom_sum,tip_sum,cant_inv,elab_sum,venc_sum,rec_sum,cod_emp) values (p_nom_sum,p_tip_sum,p_cant_inv,p_elab_sum,p_venc_sum,p_rec_sum,p_cod_emp);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Suministros set nom_sum=p_nom_sum,tip_sum=p_tip_sum,cant_inv=p_cant_inv,elab_sum=p_elab_sum,venc_sum=p_venc_sum,rec_sum=p_rec_sum,cod_emp=p_cod_emp
where cod_sum=p_cod_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Suministros
where cod_sum=p_cod_sum;
end if;

end;
//

delimiter ;




-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Ventas
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Ventas
(
p_factura int,
p_fech_venta datetime(3),
p_cod_emp int,
p_cant_vend int,
p_tot_venta decimal(10,2),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Ventas(factura,fech_venta,cod_emp,cant_vend,tot_venta) values (p_factura,p_fech_venta,p_cod_emp,p_cant_vend,p_tot_venta);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Ventas set fech_venta=p_fech_venta,cod_emp=p_cod_emp,cant_vend=p_cant_vend,tot_venta=p_tot_venta
where factura=p_factura;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Ventas
where factura=p_factura;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Detalle Ventas
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Detalle_Ventas
(
p_factura int,
p_cod_sum int,
p_cod_menu int,
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Detalle_ventas(cod_sum,cod_menu) values (p_cod_sum,p_cod_menu);
end if;
-- Actualizacion
if p_modo='A'
then
update Detalle_ventas set cod_sum=p_cod_sum,cod_menu=p_cod_menu
where factura=p_factura;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Detalle_ventas
where factura=p_factura;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Recepcion Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

CREATE PROCEDURE SP_Solicitud_Pedidos(
p_num_ped int,
p_nom_sum varchar(30),
p_fecha datetime(3),
p_tip_sum varchar(9),
p_cant_soli int,
p_cod_emp int,
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Solicitud_Pedidos(nom_sum,fecha,tip_sum,cant_soli,cod_emp) values (p_nom_sum,p_fecha,p_tip_sum,p_cant_soli,p_cod_emp);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Solicitud_Pedidos set nom_sum=p_nom_sum,fecha=p_fecha,tip_sum=p_tip_sum,cant_soli=p_cant_soli,cod_emp=p_cod_emp
where num_ped=p_num_ped;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Solicitud_Pedidos
where num_ped=p_num_ped;
end if;

end
//

delimiter ;



--  SQLINES DEMO *** cenado Para Tabla Registro De Compras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Registro_Compras
(
p_num_com int,
p_nom_art varchar(30),
p_fecha datetime(3),
p_tot_gast decimal(10,2),
p_cod_emp int,
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Registro_Compras(nom_art,fecha,tot_gast,cod_emp) values (p_nom_art,p_fecha,p_tot_gast,p_cod_emp);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Registro_Compras set nom_art=p_nom_art,fecha=p_fecha,tot_gast=p_tot_gast,cod_emp=p_cod_emp
where num_com=p_num_com;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Registro_Compras
where num_com=p_num_com;
end if;

end;
//

delimiter ;



--  SQLINES DEMO *** cenado Para Tabla freidoras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_freidoras
(
p_cod_fre int,
p_info_fre varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Freidoras(info_fre) values (p_info_fre);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Freidoras set info_fre=p_info_fre
where cod_fre=p_cod_fre;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Freidoras
where cod_fre=p_cod_fre;
end if;

end;
//

delimiter ;



--  SQLINES DEMO *** cenado Para Tabla Tipo Suministros
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Tip_Suministros
(
p_cod_sum int,
p_nom_sum varchar(60),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tipo_Suministros(nom_sum) values (p_nom_sum);
end if;
-- Actualizacion
if p_modo='A'
then
update Tipo_Suministros set nom_sum=p_nom_sum
where cod_sum=p_cod_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tipo_Suministros
where cod_sum=p_cod_sum;
end if;

end;
//

delimiter ;
