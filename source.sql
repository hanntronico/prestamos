USE bdprestacix;
-- USE otropresta;
-- select sum(monto) from detalle_prestamo where codPrestamo = 7;
-- select detalle_prestamo.*, sum(monto) from detalle_prestamo where codPrestamo = 7;

-- SELECT * FROM prestamos, detalle_prestamo, prendas
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
-- and detalle_prestamo.idPrenda = prendas.idPrenda
-- and codCliente = 14;

-- select * from prestamos;
-- select * from prendas;
-- select * from tipos;
-- select * from detalle_prestamo;
-- select * from detalle_prestamo where codPrestamo =17;
-- select prestamos.*, sum(monto) as total from prestamos, detalle_prestamo 
-- where prestamos.codPrestamo = detalle_prestamo.codPrestamo group by 1;

-- select prestamos.*, sum(monto) as total from prestamos, detalle_prestamo
-- where prestamos.codPrestamo = detalle_prestamo.codPrestamo and prestamos.codCliente = 14;

-- SELECT prestamos.*, detalle_prestamo.* FROM prestamos, detalle_prestamo
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codPrestamo =7

-- SELECT * FROM prestamos, detalle_prestamo, prendas 
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
-- AND detalle_prestamo.idPrenda = prendas.idPrenda
-- AND prestamos.codPrestamo =15;

-- select * from categorias;
-- select nomClie, apepatClie,apematClie, fecnac from clientes;
-- SELECT * FROM prestamos, clientes, categorias 
-- where prestamos.codCliente = clientes.codCliente 
-- and prestamos.codCategoria = categorias.idCategoria 
-- and prestamos.codPrestamo = 7
 
-- SELECT count(codPrestamo) as conteo FROM prestamos, detalle_prestamo
--           WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
--           AND prestamos.codCliente = 14

 
-- SELECT prestamos.*, sum(monto) AS total FROM prestamos, detalle_prestamo 
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente =14 
-- GROUP by 1

-- select * from prestamos where prestamos.codCliente = 16

-- select * from clientes;

-- SELECT prestamos.codPrestamo, count(prestamos.codPrestamo) as conteo FROM prestamos, detalle_prestamo
--         WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
--         AND prestamos.codCliente = 16 GROUP BY 1

-- SELECT * from detalle_prestamo ORDER BY 1;
-- SELECT * from prestamos;
-- SELECT count(prestamos.codPrestamo) as conteo FROM prestamos
--         WHERE prestamo_estado=1 AND prestamos.codCliente = 16;

-- delete from prestamos where codPrestamo = 12;

-- select * from prendas;

-- UPDATE prendas SET prenda_img='no_image.jpg';

-- SELECT prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
-- FROM prendas, detalle_prestamo, prestamos, clientes
-- WHERE prendas.idprenda = detalle_prestamo.idprenda 
-- AND detalle_prestamo.codprestamo = prestamos.codprestamo 
-- AND prestamos.codcliente = clientes.codcliente
-- AND prendas.idprenda = 25 ORDER BY 1;

-- SELECT prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
-- FROM prendas, detalle_prestamo, prestamos, clientes
-- WHERE prendas.idprenda = detalle_prestamo.idprenda 
-- AND detalle_prestamo.codprestamo = prestamos.codprestamo 
-- AND prestamos.codcliente = clientes.codcliente and prenda_descrip like 'p%';

-- SELECT prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie
-- FROM prendas, detalle_prestamo, prestamos, clientes
-- WHERE prendas.idprenda = detalle_prestamo.idprenda 
-- AND detalle_prestamo.codprestamo = prestamos.codprestamo
-- AND prestamos.codcliente = clientes.codcliente
-- AND prestamos.prestamo_estado = 1

-- SELECT count(prestamos.codPrestamo) as conteo FROM prestamos, detalle_prestamo
--         WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
--         AND prestamos.codCliente = 17;

-- SELECT prestamos.codPrestamo 
-- FROM prestamos, detalle_prestamo 
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
-- AND prestamos.codCliente = 17

-- SELECT count(codPrestamo) as conteo from prestamos where codPrestamo in (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=17 GROUP BY 1);

-- SELECT count(codPrestamo) as conteo from prestamos where codPrestamo in (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=17 AND prestamo_estado = 0 GROUP BY 1);

-- SELECT count(codPrestamo) as conteo from prestamos where codPrestamo in (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=17 AND prestamo_estado = 2 GROUP BY 1);

-- SELECT count(codPrestamo) as conteo FROM prestamos WHERE codPrestamo IN (SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo AND prestamos.codCliente=17 AND prestamo_estado = 2 GROUP BY 1)

-- SELECT prestamos.codPrestamo, prestamo_estado
-- FROM prestamos, detalle_prestamo
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
-- AND codCliente=17
-- GROUP BY 1; 

-- SELECT prestamos.codPrestamo, prestamo_estado 
-- FROM prestamos, detalle_prestamo
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
-- AND codCliente=17 AND prestamo_estado = 1
-- GROUP BY 1;

-- SELECT prestamos.codPrestamo, prestamo_estado 
-- FROM prestamos, detalle_prestamo
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo
-- AND codCliente=17 AND prestamo_estado = 2
-- GROUP BY 1;

-- SELECT codPrestamo, prestamo_estado 
-- FROM prestamos 
-- WHERE codcliente=17;



-- SELECT * FROM prendas where prenda_descrip like 'a%';
-- SELECT count(*) FROM prestamos;
-- SELECT count(*) FROM prestamos where prestamo_estado=1;
-- SELECT count(*) FROM prestamos where prestamo_estado=2;


-- SELECT idPrenda , prenda_descrip FROM prendas;
-- SELECT * FROM detalle_prestamo;

-- SELECT * FROM pagos ORDER BY 3;
-- SELECT * FROM detalle_prestamo WHERE codPrestamo = 18;
-- SELECT * FROM pagos WHERE codPrestamo = 18;
-- SELECT * FROM prestamos WHERE codPrestamo = 17;
-- SELECT * FROM detalle_prestamo WHERE codPrestamo = 17;
-- select * from pagos;

-- select * from prestamos where codPrestamo NOT IN (SELECT codPrestamo FROM pagos GROUP BY 1);

-- SELECT codPago, pago_descrip, codPrestamo FROM pagos GROUP BY 3;

-- select * from prestamos WHERE codPrestamo = 6;
-- select * from detalle_prestamo where codPrestamo =6;

-- **************************** OK ********************************
-- SELECT prestamos.codPrestamo, 
-- 			 sum(monto) AS total, 
-- 			 categorias.categ_interes, 
-- 			 ((sum(monto)*categorias.categ_interes)/100) as interes
-- FROM prestamos, detalle_prestamo, categorias
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
-- AND prestamos.codCategoria = categorias.idCategoria
-- AND prestamos.codPrestamo =6
-- GROUP by 1;
-- ********************************************************************


-- SELECT prestamo_estado FROM prestamos WHERE codPrestamo=20;
-- codPagos	pago_descrip	codPrestamo	fec_pago	pago_monto	cod_usuario	pago_estado
-- select * from usuario;

-- SELECT * FROM pagos;
-- SELECT * FROM pagos WHERE codPrestamo = 21;

-- SELECT pago_saldo FROM pagos WHERE codPrestamo = 19 ORDER BY codPago DESC LIMIT 1;
-- SELECT codPago, pago_saldo FROM pagos WHERE codPrestamo = 19 ORDER BY codPago ASC LIMIT 1;


-- SELECT codPago, pago_saldo FROM pagos WHERE codPrestamo = 21 ORDER BY codPago ASC LIMIT 1;

-- UPDATE prestamos SET prestamo_estado=2 WHERE codPrestamo=21;

-- select * from categorias;
-- SELECT * FROM prestamos, categorias
-- WHERE prestamos.codCategoria = categorias.idCategoria 
-- and prestamos.fec_vencim = '0000-00-00' and prestamos.codCategoria = 1;

-- select * from prestamos;

-- SELECT detalle_prestamo.codPrestamo, prendas.idPrenda, prendas.prenda_descrip 
-- FROM detalle_prestamo, prendas 
-- WHERE detalle_prestamo.idPrenda = prendas.idPrenda 
-- AND codPrestamo = 15 ORDER BY prendas.idPrenda ASC LIMIT 1;

-- SELECT * FROM prestamos WHERE prestamo_estado=0;
-- SELECT * FROM prestamos WHERE fec_vencim < '2018-07-29' ORDER BY fec_vencim;
-- SELECT * FROM prestamos, clientes WHERE prestamos.codCliente = clientes.codCliente AND prestamo_estado=1


-- SELECT * FROM prestamos, clientes WHERE prestamos.codCliente = clientes.codCliente AND prestamo_estado=1;

-- SELECT prestamos.*, prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
-- FROM prendas, detalle_prestamo, prestamos, clientes
-- WHERE prendas.idprenda = detalle_prestamo.idprenda 
-- AND detalle_prestamo.codprestamo = prestamos.codprestamo 
-- AND prestamos.codcliente = clientes.codcliente
-- AND prestamo_estado=1 GROUP BY 1 ORDER BY 1 ;

-- SELECT * FROM usuario;
-- select * from nivel where cod_nivel <> 1 ORDER BY 1;

-- SELECT * FROM categorias;
-- SELECT * FROM nivel;

-- TRUNCATE mnu_permisos;

-- INSERT INTO `mnu_permisos` (`cod_nivel`, `desc_menu`, `est_menu`) 
-- VALUES ('2', 'Panel de control', '1'), 
-- 	   	 ('2', 'Clientes', '1'),
-- 	   	 ('2', 'Préstamos', '1'),
-- 	   	 ('2', 'Prendas', '1'),
-- 	   	 ('2', 'Historial', '1'),
-- 	   	 ('2', 'Reportes', '1'),
-- 	   	 ('2', 'Ayuda', '1');

-- SELECT * FROM mnu_permisos;
-- SELECT * FROM contratos;

-- SELECT * FROM prestamos, clientes, categorias 
-- WHERE prestamos.codCliente = clientes.codCliente 
-- AND prestamos.codCategoria = categorias.idCategoria 
-- AND prestamos.codPrestamo = 23;

-- SELECT * FROM prestamos, detalle_prestamo, prendas 
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo 
-- AND detalle_prestamo.idPrenda = prendas.idPrenda
-- AND prestamos.codPrestamo = 23;


-- SELECT prestamos.*, prendas.idprenda, prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_estado, nomClie, apepatClie, apematClie 
-- FROM prendas, detalle_prestamo, prestamos, clientes
-- WHERE prendas.idprenda = detalle_prestamo.idprenda 
-- AND detalle_prestamo.codprestamo = prestamos.codPrestamoo 
-- AND prestamos.codcliente = clientes.codcliente
-- AND fec_vencim < '2018-06-30' ORDER BY fec_vencim



-- select codPrestamo from prestamos;

-- SELECT prestamos.codPrestamo FROM prestamos, detalle_prestamo
-- WHERE prestamos.codPrestamo = detalle_prestamo.codPrestamo and prestamos.codPrestamo NOT IN (SELECT codPrestamo FROM pagos GROUP BY 1) GROUP BY 1

-- SELECT pago_saldo FROM pagos WHERE codPrestamo = 15 ORDER BY codPago DESC LIMIT 1;
-- SELECT pago_descrip, fec_pago, pago_abono FROM pagos WHERE codPrestamo = 15 ORDER BY codPago DESC LIMIT 1;
-- SELECT * FROM pagos WHERE codPrestamo = 15;
-- SELECT sum(pago_abono) as total_abono FROM pagos WHERE codPrestamo = 15;

Select * from pagos where codprestamo=25;
-- SELECT pago_cargo FROM pagos WHERE codprestamo = 25 ORDER BY codPago DESC LIMIT 1


