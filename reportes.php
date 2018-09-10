<?php
	// echo "aquí los reportes";
?>

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>

<div class="outer">
	<div class="inner bg-light lter" style="color: #585858;">
		<div class="row">

			<div class="col-lg-12">
				<div class="block">
					<span id="respuesta" class="label label-success"></span>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="box">
					<header>
						<div class="icons">
							<i class="fa fa-list-alt"></i>
						</div>
						<h5>Reportes</h5>
					</header><!-- /header -->					
				</div>
			</div>
			
		</div>

<style type="text/css" media="screen">
	.btnboxito {
		padding: 25px 10px; 
		font-weight: bolder;
		font-size: 12px;
	}

	.btnboxito i {
		font-size: 28px; 
		margin-bottom: 10px;
	}

	.titulo {
		padding: 15px 8px 1px;
		font-size: 16px;
		font-weight: bold;
	}

</style>

		<div class="titulo">Caja</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('flujo_caja.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-random"></i><br>
							Flujo de Caja
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('flujo_caja.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-book"></i><br>
							Resumen de Caja
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('flujo_caja.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-long-arrow-right"></i><br>
							Registrar depósito
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('flujo_caja.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-long-arrow-left"></i><br>
							Registrar retiro
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('flujo_caja.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-money"></i><br>
							Registrar gasto
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="titulo">Clientes</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_clientes_alfa.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-sort-alpha-asc"></i><br>
							Por orden alfabético
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-star"></i><br>
							Por mejor puntuación
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_clientes_cumple.php'); return false;" >
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-calendar"></i><br>
							Cumpleañeros del mes
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-thumbs-down"></i><br>
							Sin actividad reciente
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="titulo">Préstamos</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_prestamos_vigentes.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-check-square"></i><br>
							Vigentes
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-minus-square"></i><br>
							Por vencer
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_prestamos_vencidos.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-times-circle"></i><br>
							Vencidos
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_prestamos_expirados.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-tag"></i><br>
							Expirados
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;" onclick="cargare('rpt_prestamos_liquidados.php'); return false;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-legal"></i><br>
							Liquidados
						</div>
					</div>
				</a>			
			</div>
		</div>

		<div class="titulo">Compras, ventas y apartados</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-shopping-cart"></i><br>
							Compras
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-credit-card"></i><br>
							Ventas
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-bookmark"></i><br>
							Apartados vigentes
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-bookmark-o"></i><br>
							Apartados vencidos
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="titulo">Inventario</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-briefcase"></i><br>
							Prendas empeñadas
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class=" fa fa-star-half-empty"></i><br>
							Prendas en venta
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-bullseye"></i><br>
							Prendas apartardas
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="titulo">Respaldo</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="javascript:;">
					<div class="box" style="text-align: center;">
						<div class="bg-light btnboxito">
							<i class="fa fa-file-excel-o"></i><br>
							Respaldo en Excel
						</div>
					</div>
				</a>
			</div>
		</div>		


		<div style="height: 300px;"></div>  

	</div>
</div>