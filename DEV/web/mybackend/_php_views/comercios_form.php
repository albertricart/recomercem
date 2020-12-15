<?php

//var_dump($EntityAry[$entityId]);

// - - - - - - - - - - get Tipo Data
$TipoAry = GetIdedArray( getEntity( "tipo_comercio", 0, 1 ) );

?>

<form action="<?=$scriptName?>.html?idAction=<?=((empty($EntityAry[$entityId]['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-6">
			<label for="tipo" class="col-form-label px-0">Tipo</label>
			<div class="col px-0">
				<select name="tipo" id="tipo" class="custom-select" autofocus>
					<?
					foreach( $TipoAry as $tmpData ) {
					?><option value="<?=$tmpData['id']; ?>"<?=((!empty($EntityAry[$entityId]['tipo']) && $EntityAry[$entityId]['tipo']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['nombre']; ?></option>
					<? } ?>
				</select>
			</div>
		</div>

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Nombre</label>
			<input type="text" class="col form-control" name="nombre" id="nombre" value="<?=((!empty($EntityAry[$entityId]['nombre']))?$EntityAry[$entityId]['nombre']:"")?>" />
		</div>

		<div class="form-group col-6">
			<label for="direccion" class="col col-form-label px-0">Dirección</label>
			<input type="text" class="col form-control" name="direccion" id="direccion" value="<?=((!empty($EntityAry[$entityId]['direccion']))?$EntityAry[$entityId]['direccion']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="telefono" class="col col-form-label px-0">Teléfono</label>
			<input type="tel" class="col form-control" name="telefono" id="telefono" value="<?=((!empty($EntityAry[$entityId]['telefono']))?$EntityAry[$entityId]['telefono']:"")?>" />
		</div>

		<div class="form-group col-4">
			<label for="email" class="col col-form-label px-0">eMail</label>
			<input type="email" class="col form-control" name="email" id="email" value="<?=((!empty($EntityAry[$entityId]['email']))?$EntityAry[$entityId]['email']:"")?>" />
		</div>

		<div class="form-group col-12">
			<label for="intro" class="col col-form-label px-0">Resumen (intro)</label>
			<textarea type="text" class="col form-control" name="intro" id="intro" rows="3"><?=((!empty($EntityAry[$entityId]['intro']))?$EntityAry[$entityId]['intro']:"")?></textarea>
		</div>

		<div class="form-group col-12">
			<label for="descripcion" class="col col-form-label px-0">Descripcion</label>
			<textarea type="text" class="col form-control" name="descripcion" id="descripcion" rows="5"><?=((!empty($EntityAry[$entityId]['descripcion']))?$EntityAry[$entityId]['descripcion']:"")?></textarea>
		</div>

		<div class="form-group col-12">
			<label for="etiquetas" class="col col-form-label px-0">Etiquetas</label>
			<textarea type="text" class="col form-control" name="etiquetas" id="etiquetas" rows="5"><?=((!empty($EntityAry[$entityId]['etiquetas']))?$EntityAry[$entityId]['etiquetas']:"")?></textarea>
		</div>

		<div class="form-group col-2">
			<label for="tickets_max" class="col-form-label px-0">Tickets Máximo</label>
			<input type="number" class="col form-control pl-0 text-center" name="tickets_max" size="3" id="tickets_max" value="<?=((!empty($EntityAry[$entityId]['tickets_max']))?$EntityAry[$entityId]['tickets_max']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="tickets_reservado" class="col-form-label px-0">Tickets Reservados</label>
			<input type="number" class="col form-control px-0 text-center" name="tickets_reservado" size="3" id="tickets_reservado" value="<?=((!empty($EntityAry[$entityId]['tickets_reservado']))?$EntityAry[$entityId]['tickets_reservado']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="tickets_disponible" class="col-form-label px-0">Tickets Disponibles</label>
			<input type="number" class="col form-control px-0 text-center" name="tickets_disponible" size="3" id="tickets_reservado" value="<?=((!empty($EntityAry[$entityId]['tickets_disponible']))?$EntityAry[$entityId]['tickets_disponible']:"")?>" />
		</div>

		<div class="form-group col-6">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<label for="imagen" class="col col-form-label px-0">Imagen</label>
			<input type="file" class="col form-control" name="imagen" id="imagen" />
		</div>

		<!-- control de origen y accion -->
		<input type="hidden" id="id" name="id" value="<?=((!empty($EntityAry[$entityId]['id']))?$EntityAry[$entityId]['id']:"0")?>" />
		<input type="hidden" id="password" name="password" value="<?=((!empty($EntityAry[$entityId]['password']))?$EntityAry[$entityId]['password']:password_hash('reComercem', PASSWORD_BCRYPT ))?>" />
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