<?php

//var_dump($EntityAry[$entityId]);

// - - - - - - - - - - get Tipo Data
$UsuarioAry = GetIdedArray( getEntity( "usuario", $EntityAry[$entityId]['id_usuario'], 0 ) );

// - - - - - - - - - - get Tipo Data
$ComercioAry = GetIdedArray( getEntity( "comerc", $EntityAry[$entityId]['id_comerc'], 0 ) );

?>

<form action="<?=$scriptName?>.html?idAction=<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Nombre</label>
			<input type="text" class="col form-control" name="nombre" id="nombre" value="<?=((!empty($UsuarioAry[$EntityAry[$entityId]['id_usuario']]['nombre']))?$UsuarioAry[$EntityAry[$entityId]['id_usuario']]['nombre']:"")?>" readonly />
		</div>

		<div class="form-group col-6">
			<label for="direccion" class="col col-form-label px-0">Dirección</label>
			<input type="text" class="col form-control" name="direccion" id="direccion" value="<?=((!empty($ComercioAry[$EntityAry[$entityId]['id_comerc']]))?$ComercioAry[$EntityAry[$entityId]['id_comerc']]:"")?>" readonly />
		</div>

		<div class="form-group col-6">
			<label for="fecha_emision" class="col-form-label px-0">Fecha Emision</label>
			<input type="number" class="col form-control pl-0 text-center" name="fecha_emision" size="3" id="fecha_emision" value="<?=((!empty($EntityAry[$entityId]['fecha_emision']))?$EntityAry[$entityId]['fecha_emision']:"")?>" readonly />
		</div>

		<div class="form-group col-6">
			<label for="fecha_canje" class="col-form-label px-0">Fecha de Canje</label>
			<input type="number" class="col form-control px-0 text-center" name="fecha_canje" size="3" id="fecha_canje" value="<?=((!empty($EntityAry[$entityId]['fecha_canje']))?$EntityAry[$entityId]['fecha_canje']:"")?>" readonly />
		</div>

		<!-- control de origen y accion -->
		<input type="hidden" id="id" name="id" value="<?=((!empty($EntityAry[$entityId]['id']))?$EntityAry[$entityId]['id']:"0")?>" />
		<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" />
		<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?'SQL_INSERT':'SQL_UPDATE')?>" />

	</div>

	<!-- action buttons -->
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">volver a Listado</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>