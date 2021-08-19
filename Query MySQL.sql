-- Creacion De Tablas

--  SQLINES DEMO *** rituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table control_RBD_Frituras
(
	ID int auto_increment not null primary key,
	Dia datetime(3) not null,
	pie_pollo int not null,
	por_papas int not null,
	fri_extras varchar(20) not null,
	tot_fritura int not null,
	acum int not null,
	cam_rbd datetime(3),
	sac_emp int
);

--  SQLINES DEMO *** troles De Venta
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table controles
(
	ID int auto_increment primary key,
	factura varchar(20) not null,
	alim_elab varchar(10) not null,
	alim_entr varchar(10) not null,
	coor_resp varchar(10) not null,
	tel_cont varchar(9) not null,
	fecha datetime(3),
	hor_elab time(6),
	hor_desp time(6),
	hor_entr time(6)
);

--  SQLINES DEMO *** epcion De Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table recepcion_pedidos
(
	ID int auto_increment primary key,
	num_pedido int,
	dia	varchar(10),
	fecha datetime(3),
	prod varchar(30) not null,
	cant int not null,
	peso decimal(10,2),
	vencimiento datetime(3)
);

--  SQLINES DEMO *** Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table pedidos
(
ID int auto_increment primary key,
prod varchar(30) not null,
cant_soli int not null,
cant_reci int not null
);

--  SQLINES DEMO *** Controles Mensuales
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table control_mensual
(
ID  int auto_increment primary key,
cod_emp int not null,
Nom_emp varchar(30) not null,
Tur_emp varchar(30) not null,
Tel_emp varchar(30) not null
);

--  SQLINES DEMO *** trol Suministros Congelados
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table controle_pollo_refrigerado
(
ID int auto_increment primary key,
Nom_emp varchar(30) not null,
fecha datetime(3),
prod varchar(30) not null,
inv_am int not null,
ing int not null,
inv_pm int not null,
dif int
);

--  SQLINES DEMO *** trol De Refrescos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table refrescos
(
ID int auto_increment primary key,
Nom_emp varchar(30)not null,
fecha varchar(30)not null,
prod varchar(30)not null,
inv_am int not null,
ing int not null,
inv_pm int not null,
dif int
);

-- SQLINES DEMO *** mato Fechas (Dia,Mes,Año)
set dateformat dmy;

--  SQLINES DEMO *** e Datos En Tabla Control Frituras
insert into control_RBD_Frituras (Dia, pie_pollo, por_papas, fri_extras, tot_fritura, acum, cam_rbd, sac_emp)
values ('11-08-2021', '2', '4', 'Nuggets', '2','3', '13-08-2021','4')

--  SQLINES DEMO *** e Datos Insertados Control Frituras
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from control_RBD_Frituras

--  SQLINES DEMO *** e Datos En Tabla Controles De Venta
insert into controles (factura, alim_elab, alim_entr, coor_resp, tel_cont, fecha, hor_elab, hor_desp, hor_entr)
values ('Num1', 'Iris', 'Roger', 'Sonia', '9954-1290', '12-09-2021','02:50','03:15','03:45')

--  SQLINES DEMO *** e Datos Insertados En Tabla Controles De venta
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from controles

--  SQLINES DEMO *** e Datos En Tabla Recepcion De Pedidos
insert into recepcion_pedidos(num_pedido, dia, fecha, prod, cant, peso, vencimiento)
values ('01', 'Lunes', '12-08-2021', 'Pollo Marinado', '5', '2.01', '12-12-2021')

--  SQLINES DEMO *** e Datos Insertados En Tabla Recepcion De Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from recepcion_pedidos

--  SQLINES DEMO *** e Datos En Tabla Pedidos
insert into pedidos (cant_soli, cant_reci)
values ('20', '30')

--  SQLINES DEMO *** e Datos En Tabla Pedidos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from pedidos

--  SQLINES DEMO *** e Datos En Tabla Controles Mensuales
insert into control_mensual (cod_emp, Nom_emp, Tur_emp, Tel_emp)
values ('01','Jose','AM','9780-2345')

--  SQLINES DEMO *** e Datos En Tabla Controles Mensuales
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from control_mensual

--  SQLINES DEMO *** e Datos En Tabla Control Congelados
insert into controle_pollo_refrigerado(Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-2021', 'Papas', '284', '0', '260', '24')

--  SQLINES DEMO *** e Datos En Tabla Control Congelados
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from controle_pollo_refrigerado

--  SQLINES DEMO *** De Datos En Tabla Refrescos
insert into refrescos (Nom_emp, fecha, prod, inv_am, ing, inv_pm, dif)
values ('Jose', '12-08-21', 'Te Lipton', '1', '0', '0', '1')

--  SQLINES DEMO *** e Datos En Tabla Refrescos
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from refrescos

-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Control Frituras
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
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into control_RBD_Frituras values (@dia, @pie_pollo, @por_papas,@fri_extras,@tot_fritura,@acum,@cam_rbd,@sac_emp);
end if;
-- Actualizacion
if @modo='A'
then
update control_RBD_Frituras set Dia=@dia,pie_pollo=@pie_pollo,por_papas=@por_papas,fri_extras=@fri_extras,tot_fritura=@tot_fritura,acum=@acum,cam_rbd=@cam_rbd,sac_emp=@sac_emp
where Dia=@dia;
end if;
-- Eliminacion
if @modo='E'
then 
delete from control_RBD_Frituras
where dia=@dia;
end if;
 

--  SQLINES DEMO *** edimiento Almacenado Para Ingresaer Datos En Tabla Control Frituras

-- Inserta
execute SP_ControlFrituras '11-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'I'

-- Actualiza
execute SP_ControlFrituras '14-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'A'

-- Elimina
execute SP_ControlFrituras '14-08-2021', 7, 4, 'Nuggets', 2,3,'13-08-2021',4,'E'
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from control_RBD_Frituras

-- SQLINES DEMO *** iento Almacenado Para Mantenimiento Tabla Controles Ventas
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
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into controles values (@factura,@alim_elab,@alim_entr,@coor_resp,@tel_cont,@fecha,@hor_elab,@hor_desp,@hor_entr);
end if;
-- Actualizacion
if @modo='A'
then
update controles set factura=@factura,alim_elab=@alim_elab,alim_entr=@alim_entr,coor_resp=@coor_resp,tel_cont=@tel_cont,fecha=@fecha,hor_elab=@hor_elab,hor_desp=@hor_desp,hor_entr=@hor_entr
where factura=@factura;
end if;
-- Eliminacion
if @modo='E'
then 
delete from controles
where factura=@factura;
end if;
 

--  SQLINES DEMO *** edimiento Almacenado Para Ingresaer Datos En Tabla Control Ventas

-- Inserta
execute SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9964-1293', '14-09-2021','04:50','05:15','05:45', 'I'

-- Actualiza
execute SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9784-1293', '14-09-2021','04:50','05:15','05:45', 'A'

-- Elimina
execute SP_ControlVentas 'Num2', 'Yessica', 'Manuel', 'Erick', '9784-1293', '14-09-2021','04:50','05:15','05:45', 'E'
-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from controles

--  SQLINES DEMO *** ento Almacenado Para Mantenimiento De La Tabla Recepcion De Pedidos
create proc SP_RecepcionPedidos
(
@num_pedido int,
@dia varchar(10),
@fecha datetime,
@prod varchar(30),
@cant int,
@peso decimal(10,2),
@vencimiento datetime,
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into recepcion_pedidos values (@num_pedido,@dia,@fecha,@prod,@cant,@peso,@vencimiento);
end if;
-- Actualizacion
if @modo='A'
then
update recepcion_pedidos set num_pedido=@num_pedido,dia=@dia,fecha=@fecha,prod=@prod,cant=@cant,peso=@peso,vencimiento=@vencimiento
where num_pedido=@num_pedido;
end if;
-- Eliminacion
if @modo='E'
then 
delete from recepcion_pedidos
where num_pedido=@num_pedido;
end if;
 

-- Inserta
execute SP_RecepcionPedidos 02, 'Martes', '12-08-2021', 'Refrescos', 5, 2.01, '12-12-2021', 'I'

-- Actualiza
execute SP_RecepcionPedidos 02, 'Miercoles', '16-08-2021', 'Empanizador', 5, 2.01, '12-12-2021', 'A'

-- Elimina
execute SP_RecepcionPedidos 01, 'Lunes', '12-08-2021', 'Pollo Marinado', 5, 2.01, '12-12-2021', 'E'

-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from recepcion_pedidos

--  SQLINES DEMO *** ento Almacenado Para Mantenimiento De La Tabla  De Pedidos
create proc SP_Pedidos
(
@prod varchar(30),
@cant_soli int,
@cant_reci int,
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into pedidos values (@prod,@cant_soli,@cant_reci);
end if;
-- Actualizacion
if @modo='A'
then
update pedidos set prod=@prod,cant_soli=@cant_soli,cant_reci=@cant_reci
where prod=@prod;
end if;
-- Eliminacion
if @modo='E'
then 
delete from pedidos
where prod=@prod;
end if;
 

-- Inserta
execute SP_Pedidos 'Alas De Pollo',25, 12, 'I'

-- Actualiza
execute SP_Pedidos 'Papas',15, 12, 'A'

-- Elimina
execute SP_Pedidos 'Refrescos',5, 2, 'E'

-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from pedidos

--  SQLINES DEMO *** ento Almacenado Para Mantenimiento De La Tabla Controles Mensuales
create proc SP_ControlMensual
(
@cod_emp int,
@Nom_emp varchar(30),
@Tur_emp varchar(30),
@Tel_emp varchar(30),
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into control_mensual values (@cod_emp,@Nom_emp,@Tur_emp,@Tel_emp);
end if;
-- Actualizacion
if @modo='A'
then
update control_mensual set cod_emp=@cod_emp,Nom_emp=@Nom_emp,Tur_emp=@Tur_emp,Tel_emp=@Tel_emp
where cod_emp=@cod_emp;
end if;
-- Eliminacion
if @modo='E'
then 
delete from control_mensual
where cod_emp=@cod_emp;
end if;
 

-- Inserta
execute SP_ControlMensual 02,'Jose','AM','9780-2345','I'

-- Actualiza
execute SP_ControlMensual 02,'Estiven','PM','9720-2440','A'

-- Elimina
execute SP_ControlMensual 01,'Jose','AM','9780-2345','E'

-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from control_mensual

--  SQLINES DEMO *** ento Almacenado Para Mantenimiento De La Tabla Suministros Congelados
create proc SP_SuministrosCongelados
(
@Nom_emp varchar(30),
@fecha datetime,
@prod varchar(30),
@inv_am int,
@ing int,
@inv_pm int,
@dif int,
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into controle_pollo_refrigerado values (@Nom_emp,@fecha,@prod,@inv_am,@ing,@inv_pm,@dif);
end if;
-- Actualizacion
if @modo='A'
then
update controle_pollo_refrigerado set Nom_emp=@Nom_emp,fecha=@fecha,prod=@prod,inv_am=@inv_am,ing=@ing,inv_pm=@inv_pm,dif=@dif
where Nom_emp=@Nom_emp;
end if;
-- Eliminacion
if @modo='E'
then 
delete from controle_pollo_refrigerado
where Nom_emp=@Nom_emp;
end if;
 

-- Inserta
execute SP_SuministrosCongelados 'Rafael', '16-08-2021', 'Pollo', 288, 0, 260, 28,'I'

-- Actualiza
execute SP_ControlMensual 02,'Estiven','PM','9720-2440','A'

-- Elimina
execute SP_ControlMensual 01,'Jose','AM','9780-2345','E'

-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from controle_pollo_refrigerado

--  SQLINES DEMO *** ento Almacenado Para Mantenimiento De La Tabla Suministros Congelados
create proc SP_Refrescos
(
@Nom_emp varchar(30),
@fecha datetime,
@prod varchar(30),
@inv_am int,
@ing int,
@inv_pm int,
@dif int,
@modo cast(char(1) as char)
)
as
-- Inserccion
if @modo='I'
then
insert into refrescos values (@Nom_emp,@fecha,@prod,@inv_am,@ing,@inv_pm,@dif);
end if;
-- Actualizacion
if @modo='A'
then
update refrescos set Nom_emp=@Nom_emp,fecha=@fecha,prod=@prod,inv_am=@inv_am,ing=@ing,inv_pm=@inv_pm,dif=@dif
where Nom_emp=@Nom_emp;
end if;
-- Eliminacion
if @modo='E'
then 
delete from refrescos
where Nom_emp=@Nom_emp;
end if;
 

-- Inserta
execute SP_Refrescos 'Rafael', '16-08-2021', '/up', 288, 0, 260, 28,'I'

-- Actualiza
execute SP_Refrescos 'Rafael', '16-08-2021', '7up', 288, 0, 260, 28,'A'

-- Elimina
execute SP_Refrescos 'Rafael', '16-08-2021', '/up', 288, 0, 260, 28,'E'

-- SQLINES LICENSE FOR EVALUATION USE ONLY
select * from refrescos

