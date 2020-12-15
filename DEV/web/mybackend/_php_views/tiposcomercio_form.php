<?php

//var_dump($EntityAry[$entityId]);

// - - - - - - - - - - get ScriptName
$scriptName = explode( '/', $_SERVER['PHP_SELF']);
$scriptName = explode( '.', $scriptName[ count($scriptName)-1 ] );

?>

<form action="<?=$scriptName?>.html?idAction=<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Nombre</label>
			<input type="text" class="col form-control" name="nombre" id="nombre" value="<?=((!empty($EntityAry[$entityId]['nombre']))?$EntityAry[$entityId]['nombre']:"")?>" />
		</div>

		<div class="form-group col-12">
			<label for="descripcion" class="col col-form-label px-0">Descripcion</label>
			<textarea type="text" class="col form-control" name="descripcion" id="descripcion" rows="5"><?=((!empty($EntityAry[$entityId]['descripcion']))?$EntityAry[$entityId]['descripcion']:"")?></textarea>
		</div>

		<!-- control de origen y accion -->
		<input type="hidden" id="id" name="id" value="<?=((!empty($EntityAry[$entityId]['id']))?$EntityAry[$entityId]['id']:"0")?>" />
		<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" />
		<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?'SQL_INSERT':'SQL_UPDATE')?>" />

	</div>

	<!-- action buttons -->
	<button type="submit" class="btn btn-primary float-sm-right ml-5"><?php echo ((empty($EntityAry[$entityId]['id']))?"Insertar":"Modificar");?></button>
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">Cancelar</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>