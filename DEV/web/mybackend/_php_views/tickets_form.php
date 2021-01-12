<?php

//var_dump($EntityAry[$entityId]);

// - - - - - - - - - - get Tipo Data
$UsuarioAry = GetIdedArray( getEntity( "usuario", $EntityAry[$entityId]['id_usuario'], 0 ) );

// - - - - - - - - - - get Tipo Data
$ComercioAry = GetIdedArray( getEntity( "comerc", $EntityAry[$entityId]['id_comerc'], 0 ) );

?>

<form action="<?=$scriptName?>.html?idAction=<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-4">
			<label for="nombre" class="col col-form-label px-0">Ticket</label>
			<input type="text" class="col form-control" value="<?=((!empty($EntityAry[$entityId]['cid']))?$EntityAry[$entityId]['id']:"")?>" readonly />
		</div>

		<div class="form-group col-4">
			<label for="fecha_emision" class="col-form-label px-0">Fecha Emision</label>
			<input type="text" class="col form-control pl-0 text-center" value="<?=((strval($EntityAry[$entityId]['fecha_emision'])>0)?date('d/m/Y H:i',strval($EntityAry[$entityId]['fecha_emision'])):"")?>" readonly />
		</div>

		<div class="form-group col-4">
			<label for="fecha_canje" class="col-form-label px-0">Fecha de Canje</label>
			<input type="text" class="col form-control px-0 text-center" value="<?=((strval($EntityAry[$entityId]['fecha_canje'])>0)?date('d/m/Y H:i',strval($EntityAry[$entityId]['fecha_canje'])):"")?>" readonly />
		</div>

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Usuario</label>
			<input type="text" class="col form-control" value="<?=((!empty($UsuarioAry[$EntityAry[$entityId]['id_usuario']]['nombre']))?$UsuarioAry[$EntityAry[$entityId]['id_usuario']]['nombre']:"")?>" readonly />
		</div>

		<div class="form-group col-6">
			<label for="direccion" class="col col-form-label px-0">Comercio</label>
			<input type="text" class="col form-control" value="<?=((!empty($ComercioAry[$EntityAry[$entityId]['id_comerc']]['nombre']))?$ComercioAry[$EntityAry[$entityId]['id_comerc']]['nombre']:"")?>" readonly />
		</div>

	</div>

	<!-- action buttons -->
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">volver a Listado</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>