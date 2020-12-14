<?php

// - - - - - - - - - - get Tipo Data
$TipoAry = GetIdedArray( getEntity( "tipo_comercio", 0 ) );

// - - - - - - - - - - get ScriptName
$scriptName = explode( '/', $_SERVER['PHP_SELF']);
$scriptName = explode( '.', $scriptName[ count($scriptName)-1 ] );

?>

<form action="<?=$scriptName[0]?>.html?idAction=<?=((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="row">

		<div class="form-group col-6">
			<label for="tipo" class="col-form-label px-0">Tipo</label>
			<div class="col px-0">
				<select name="tipo" id="tipo" class="custom-select" autofocus>
					<?
					foreach( $TipoAry as $tmpData ) {
					?><option value="<?=$tmpData['id']; ?>"<?=((!empty($_SESSION['tipo']) && $_SESSION['tipo']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['name']; ?></option>
					<? } ?>
				</select>
			</div>
		</div>

		<div class="form-group col-6">
			<label for="nombre" class="col col-form-label px-0">Nombre</label>
			<input type="text" class="col form-control" name="nombre" id="nombre" value="<?=((!empty($_SESSION['nombre']))?$_SESSION['nombre']:"")?>" />
		</div>

		<div class="form-group col-6">
			<label for="direccion" class="col col-form-label px-0">Dirección</label>
			<input type="text" class="col form-control" name="direccion" id="direccion" value="<?=((!empty($_SESSION['direccion']))?$_SESSION['direccion']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="telefono" class="col col-form-label px-0">Teléfono</label>
			<input type="tel" class="col form-control" name="telefono" id="telefono" value="<?=((!empty($_SESSION['telefono']))?$_SESSION['telefono']:"")?>" />
		</div>

		<div class="form-group col-4">
			<label for="email" class="col col-form-label px-0">eMail</label>
			<input type="email" class="col form-control" name="email" id="email" value="<?=((!empty($_SESSION['email']))?$_SESSION['email']:"")?>" />
		</div>

		<div class="form-group col-12">
			<label for="intro" class="col col-form-label px-0">Resumen (intro)</label>
			<textarea type="text" class="col form-control" name="intro" id="intro" rows="3"><?=((!empty($_SESSION['intro']))?$_SESSION['intro']:"")?></textarea>
		</div>

		<div class="form-group col-12">
			<label for="descripcion" class="col col-form-label px-0">Descripcion</label>
			<textarea type="text" class="col form-control" name="descripcion" id="descripcion" rows="5">
				<?=((!empty($_SESSION['descripcion']))?$_SESSION['descripcion']:"")?>
			</textarea>
		</div>

		<div class="form-group col-12">
			<label for="etiquetas" class="col col-form-label px-0">Etiquetas</label>
			<textarea type="text" class="col form-control" name="etiquetas" id="etiquetas" rows="5"><?=((!empty($_SESSION['etiquetas']))?$_SESSION['etiquetas']:"")?></textarea>
		</div>

		<div class="form-group col-2">
			<label for="tickets_max" class="col-form-label px-0">Tickets Máximo</label>
			<input type="number" class="col form-control pl-0" name="tickets_max" size="3" id="tickets_max" value="<?=((!empty($_SESSION['tickets_max']))?$_SESSION['tickets_max']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="tickets_reservado" class="col-form-label px-0">Tickets Reservados</label>
			<input type="number" class="col form-control px-0" name="tickets_reservado" size="3" id="tickets_reservado" value="<?=((!empty($_SESSION['tickets_reservado']))?$_SESSION['tickets_reservado']:"")?>" />
		</div>

		<div class="form-group col-2">
			<label for="tickets_disponible" class="col-form-label px-0">Tickets Disponibles</label>
			<input type="number" class="col form-control px-0" name="tickets_disponible" size="3" id="tickets_reservado" value="<?=((!empty($_SESSION['tickets_disponible']))?$_SESSION['tickets_disponible']:"")?>" />
		</div>

		<div class="form-group col-6">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<label for="imagen" class="col col-form-label px-0">Imagen</label>
			<input type="file" class="col form-control" name="imagen" id="imagen" />
		</div>

		<!-- control de origen y accion -->
		<input type="hidden" id="id" name="id" value="<?=((!empty($_SESSION['id']))?$_SESSION['id']:"0")?>" />
		<input type="hidden" id="password" name="password" value="<?=((!empty($_SESSION['password']))?$_SESSION['password']:crypt('reComercem','magomo'))?>" />
		<?=(($useCID)?'<input type="hidden" id="cid" name="cid" value="'.$cid.'" />':'')?>
		<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?=((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE)?>" />
		<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?=((empty($_SESSION['id']))?'SQL_INSERT':'SQL_UPDATE')?>" />

	</div>

	<!-- action buttons -->
	<button type="submit" class="btn btn-primary float-sm-right ml-5"><?php echo ((empty($_SESSION['id']))?"Insertar":"Modificar");?></button>
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">Cancelar</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>