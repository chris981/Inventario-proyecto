create database dbPollera
 

use dbpollera;
 

-- Creacion De Tablas

--  SQLINES DEMO *** rituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Control_Frituras
(
	tot_fri int auto_increment not null primary key,
	cant_fri int not null,
	info_fritura varchar(60) not null,
	cant_comida int not null,
	nom_coc varchar(60) not null,
	hor_fri datetime(3) not null,
	cam_rbd datetime(3) not null,
	nom_cam_rbd varchar(60) not null
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
	emp_rec varchar(30) not null
);

--  SQLINES DEMO *** Frios
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Suministros_Frios
(
	cod_sum int auto_increment not null primary key,
	nom_sum varchar(60) not null,
	cant_inv int not null,
	elab_sum datetime(3) not null,
	venc_sum datetime(3) not null,
	rec_sum datetime(3) not null,
	emp_rec varchar(30) not null
);

--  SQLINES DEMO *** Secos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Suministros_Secos
(
	cod_sum int auto_increment not null primary key,
	nom_sum varchar(60) not null,
	cant_inv int not null,
	elab_sum datetime(3) not null,
	venc_sum datetime(3) not null,
	rec_sum datetime(3) not null,
	emp_rec varchar(30) not null
);

-- Tabla Ventas
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Ventas
(
	factura int auto_increment not null primary key,
	fech_venta datetime(3) not null,
	nom_emp varchar(30) not null,
	coor_resp varchar(30) not null,
	cant_vend int not null,
	det_ven varchar(60) not null,
	tot_venta decimal(10,2) not null
);

-- Tabla Empleados
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Empleados
(
	cod_emp int auto_increment not null primary key,
	nom_emp varchar(30) not null,
	ape_emp varchar(30) not null,
	res_emp varchar(30),
	hor_emp varchar(9) not null,
	cant_ventas int not null,
	cant_din_ventas decimal(10,2)
);

-- Tabla Usuarios
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Usuarios
(
	cod_emp int auto_increment not null primary key,
	nom_emp varchar(30) not null,
	ape_emp varchar(30) not null,
	res_emp varchar(30),
	hor_emp varchar(9) not null,
	usu_emp varchar(60) not null,
	con_usu varchar(60) not null
);

-- Tabla Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Pedidos
(
	num_ped int auto_increment not null primary key,
	nom_sum varchar(30) not null,
	fecha datetime(3) not null,
	tip_sum varchar(9) not null,
	cant_soli int not null, 
	enc_pedido varchar(30) not null
);

--  SQLINES DEMO ***  Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Recepcion_Pedidos
(
	num_ped int auto_increment not null primary key,
	nom_sum varchar(30) not null,
	fecha datetime(3) not null,
	tip_sum varchar(9) not null,
	cant_reci int not null, 
	enc_recepcion varchar(30) not null,
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
	enc_compra varchar(30) not null
);

--  SQLINES DEMO *** astos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table Tabla_Control_Gastos
(
	num_gast int auto_increment not null primary key,
	tot_gast decimal(10,2) not null
);

-- SQLINES DEMO *** mato Fechas (Dia,Mes,Año)
set dateformat dmy;

-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Control Frituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_ControlFrituras
(
p_cant_fri int,
p_info_fritura varchar(60),
p_cant_comida int,
p_nom_coc varchar(60),
p_hor_fri datetime(3),
p_cam_rbd datetime(3),
p_nom_cam_rbd varchar(60),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Control_Frituras values (p_cant_fri,p_info_fritura,p_cant_comida,p_nom_coc,p_hor_fri,p_cam_rbd,p_nom_cam_rbd);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Control_Frituras set cant_fri=p_cant_fri,info_fritura=p_info_fritura,cant_comida=p_cant_comida,nom_coc=p_nom_coc,hor_fri=p_hor_fri,cam_rbd=p_cam_rbd,nom_cam_rbd=p_nom_cam_rbd
where cant_fri=p_cant_fri;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Control_Frituras
where cant_fri=p_cant_fri;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Menu Productos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Menu
(
p_nom_menu varchar(60),
p_pre_menu int,
p_tip_prod varchar(9),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Menu values (p_nom_menu,p_pre_menu,p_tip_prod);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_menu set nom_menu=p_nom_menu,pre_menu=p_pre_menu,tip_prod=p_tip_prod
where nom_menu=p_nom_menu;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_menu
where nom_menu=p_nom_menu;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Suministros
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Suministros
(
p_nom_sum varchar(60),
p_tip_sum varchar(9),
p_cant_inv int,
p_elab_sum datetime(3),
p_venc_sum datetime(3),
p_rec_sum datetime(3),
p_emp_rec varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Suministros values (p_nom_sum,p_tip_sum,p_cant_inv,p_elab_sum,p_venc_sum,p_rec_sum,p_emp_rec);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Suministros set nom_sum=p_nom_sum,tip_sum=p_tip_sum,cant_inv=p_cant_inv,elab_sum=p_elab_sum,venc_sum=p_venc_sum,rec_sum=p_rec_sum,emp_rec=p_emp_rec
where nom_sum=p_nom_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Suministros
where nom_sum=p_nom_sum;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Suministros Frios
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Suministros_Frios
(
p_nom_sum varchar(60),
p_cant_inv int,
p_elab_sum datetime(3),
p_venc_sum datetime(3),
p_rec_sum datetime(3),
p_emp_rec varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Suministros_Frios values (p_nom_sum,p_cant_inv,p_elab_sum,p_venc_sum,p_rec_sum,p_emp_rec);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Suministros_Frios set nom_sum=p_nom_sum,cant_inv=p_cant_inv,elab_sum=p_elab_sum,venc_sum=p_venc_sum,rec_sum=p_rec_sum,emp_rec=p_emp_rec
where nom_sum=p_nom_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Suministros_Frios
where nom_sum=p_nom_sum;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Suministros Secos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Suministros_Secos
(
p_nom_sum varchar(60),
p_cant_inv int,
p_elab_sum datetime(3),
p_venc_sum datetime(3),
p_rec_sum datetime(3),
p_emp_rec varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Suministros_Secos values (p_nom_sum,p_cant_inv,p_elab_sum,p_venc_sum,p_rec_sum,p_emp_rec);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Suministros_Secos set nom_sum=p_nom_sum,cant_inv=p_cant_inv,elab_sum=p_elab_sum,venc_sum=p_venc_sum,rec_sum=p_rec_sum,emp_rec=p_emp_rec
where nom_sum=p_nom_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Suministros_Secos
where nom_sum=p_nom_sum;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Ventas
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Ventas
(
p_fech_venta datetime(3),
p_nom_emp varchar(30),
p_coor_resp varchar(30),
p_cant_vend int,
p_det_ven varchar(60),
p_tot_venta decimal(10,2),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Ventas values (p_fech_venta,p_nom_emp,p_coor_resp,p_cant_vend,p_det_ven,p_tot_venta);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Ventas set fech_venta=p_fech_venta,nom_emp=p_nom_emp,coor_resp=p_coor_resp,cant_vend=p_cant_vend,det_ven=p_det_ven,tot_venta=p_tot_venta
where fech_venta=p_fech_venta;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Ventas
where fech_venta=p_fech_venta;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Empleados
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Empleados
(
p_nom_emp varchar(30),
p_ape_emp varchar(30),
p_res_emp varchar(30),
p_hor_emp varchar(9),
p_cant_ventas int,
p_cant_din_ventas decimal(10,2),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Empleados values (p_nom_emp,p_ape_emp,p_res_emp,p_hor_emp,p_cant_ventas,p_cant_din_ventas);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Empleados set nom_emp=p_nom_emp,ape_emp=p_ape_emp,res_emp=p_res_emp,hor_emp=p_hor_emp,cant_ventas=p_cant_ventas,cant_din_ventas=p_cant_din_ventas
where nom_emp=p_nom_emp;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Empleados
where nom_emp=p_nom_emp;
end if;

end;
//

delimiter ;




-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Usuarios
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Usuarios
(
p_nom_emp varchar(30),
p_ape_emp varchar(30),
p_res_emp varchar(30),
p_hor_emp varchar(9),
p_usu_emp varchar(60),
p_con_usu varchar(60),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Usuarios values (p_nom_emp,p_ape_emp,p_res_emp,p_hor_emp,p_usu_emp,p_con_usu);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Usuarios set nom_emp=p_nom_emp,ape_emp=p_ape_emp,res_emp=p_res_emp,hor_emp=p_hor_emp,usu_emp=p_usu_emp,con_usu=p_con_usu
where nom_emp=p_nom_emp;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Usuarios
where nom_emp=p_nom_emp;
end if;

end;
//

delimiter ;




-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Pedidos
(
p_nom_sum varchar(30),
p_fecha datetime(3),
p_tip_sum varchar(9),
p_cant_soli int, 
p_enc_pedido varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Pedidos values (p_nom_sum,p_fecha,p_tip_sum,p_cant_soli,p_enc_pedido);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Pedidos set nom_sum=p_nom_sum,fecha=p_fecha,tip_sum=p_tip_sum,cant_soli=p_cant_soli,enc_pedido=p_enc_pedido
where nom_sum=p_nom_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Pedidos
where nom_sum=p_nom_sum;
end if;

end;
//

delimiter ;




-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Recepcion De Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Recepcion_Pedidos
(
p_nom_sum varchar(30),
p_fecha datetime(3),
p_tip_sum varchar(9),
p_cant_reci int, 
p_enc_recepcion varchar(30),
p_tot_gasto decimal(10,2),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Recepcion_Pedidos values (p_nom_sum,p_fecha,p_tip_sum,p_cant_reci,p_enc_recepcion,p_tot_gasto);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Recepcion_Pedidos set nom_sum=p_nom_sum,fecha=p_fecha,tip_sum=p_tip_sum,cant_reci=p_cant_reci,enc_recepcion=p_enc_recepcion,tot_gasto=p_tot_gasto
where nom_sum=p_nom_sum;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Recepcion_Pedidos
where nom_sum=p_nom_sum;
end if;

end;
//

delimiter ;



-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Registro De Compras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Registro_Compras
(
p_nom_art varchar(30),
p_fecha datetime(3),
p_tot_gast decimal(10,2),
p_enc_compra varchar(30),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Registro_Compras values (p_nom_art,p_fecha,p_tot_gast,p_enc_compra);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Registro_Compras set nom_art=p_nom_art,fecha=p_fecha,tot_gast=p_tot_gast,enc_compra=p_enc_compra
where nom_art=p_nom_art;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Registro_Compras
where nom_art=p_nom_art;
end if;

end;
//

delimiter ;




-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Control De Gastos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
delimiter //

create procedure SP_Control_Gastos
(
p_tot_gast decimal(10,2),
p_modo char(1)
)
begin
-- Inserccion
if p_modo='I'
then
insert into Tabla_Control_Gastos values (p_tot_gast);
end if;
-- Actualizacion
if p_modo='A'
then
update Tabla_Control_Gastos set tot_gast=p_tot_gast
where tot_gast=p_tot_gast;
end if;
-- Eliminacion
if p_modo='E'
then 
delete from Tabla_Control_Gastos
where tot_gast=p_tot_gast;
end if;

end;
//

delimiter ;


