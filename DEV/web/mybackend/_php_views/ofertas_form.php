<?php

//var_dump($EntityAry[$entityId]);

// - - - - - - - - - - get Tipo Data
$ComercioAry = GetIdedArray( getEntity( "comerc", 0, 1 ) );

?>

<form action="<?=$scriptName?>.html?idAction=<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-6">
			<label for="id_comerc" class="col-form-label px-0">Tipo</label>
			<div class="col px-0">
				<select name="id_comerc" id="id_comerc" class="custom-select" autofocus>
					<?
					foreach( $ComercioAry as $tmpData ) {
					?><option value="<?=$tmpData['id']; ?>"<?=((!empty($EntityAry[$entityId]['id_comerc']) && $EntityAry[$entityId]['id_comerc']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['nombre']; ?></option>
					<? } ?>
				</select>
			</div>
		</div>

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Nombre</label>
			<input type="text" class="col form-control" name="nombre" id="nombre" value="<?=((!empty($EntityAry[$entityId]['nombre']))?$EntityAry[$entityId]['nombre']:"")?>" />
		</div>

		<div class="form-group col-12">
			<label for="descripcion" class="col col-form-label px-0">Descripcion</label>
			<textarea type="text" class="col form-control" name="descripcion" id="descripcion" rows="5"><?=((!empty($EntityAry[$entityId]['descripcion']))?$EntityAry[$entityId]['descripcion']:"")?></textarea>
		</div>

		<div class="form-group col-12">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<label for="imagen" class="col col-form-label px-0">Imagen</label>
			<input type="file" class="col form-control" name="imagen" id="imagen" />
		</div>

		<!-- control de origen y accion -->
		<input type="hidden" id="id" name="id" value="<?=((!empty($EntityAry[$entityId]['id']))?$EntityAry[$entityId]['id']:"0")?>" />
		<?=(($useCID)?'<input type="hidden" id="cid" name="cid" value="'.((!empty($EntityAry[$entityId]['cid']))?$EntityAry[$entityId]['cid']:$cid).'" />':'')?>
		<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" />
		<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?=((empty($EntityAry[$entityId]['id']))?'SQL_INSERT':'SQL_UPDATE')?>" />

	</div>

	<!-- action buttons -->
	<button type="submit" class="btn btn-primary float-sm-right ml-5"><?php echo ((empty($EntityAry[$entityId]['id']))?"Insertar":"Modificar");?></button>
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">Cancelar</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>