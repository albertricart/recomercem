<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Load General Tables Data =>

// TipoAry => array( id, active, name, description )
$TipoAry = GetIdedArray( getEntity( "tipo_comercio", 0 ) );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Load General Tables Data //

?>

<form action="comercios.html?idAction=<?=((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE)?>" method="POST" target="_self" enctype="multipart/form-data">

	<div class="form-group row">
		<label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
		<div class="col-sm-10 px-0">
			<select name="tipo" id="tipo" class="custom-select">
				<?
				foreach( $TipoAry as $tmpData ) {
				?><option value="<?=$tmpData['id']; ?>"<?=((!empty($_SESSION['tipo']) && $_SESSION['tipo']==$tmpData['id'])?" selected":""); ?>><?=$tmpData['name']; ?></option>
				<? } ?>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
		<input type="text" class="col-sm-10 form-control" name="nombre" id="nombre" value="<?=((!empty($_SESSION['nombre']))?$_SESSION['nombre']:"")?>">
	</div>

	<div class="form-group row">
		<label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
		<input type="text" class="col-sm-10 form-control" name="direccion" id="direccion" value="<?=((!empty($_SESSION['direccion']))?$_SESSION['direccion']:"")?>">
	</div>

	<div class="form-group row">
		<label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
		<input type="tel" class="col-sm-10 form-control" name="telefono" id="telefono" value="<?=((!empty($_SESSION['telefono']))?$_SESSION['telefono']:"")?>">
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">eMail</label>
		<input type="email" class="col-sm-10 form-control" name="email" id="email" value="<?=((!empty($_SESSION['email']))?$_SESSION['email']:"")?>">
	</div>

	<div class="form-group row">
		<label for="intro" class="col-sm-2 col-form-label">Resumen (intro)</label>
		<textarea type="text" class="col-sm-10 form-control" name="intro" id="intro" rows="3"><?=((!empty($_SESSION['intro']))?$_SESSION['intro']:"")?></textarea>
	</div>

	<div class="form-group row">
		<label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
		<textarea type="text" class="col-sm-10 form-control" name="descripcion" id="descripcion" rows="5"><?=((!empty($_SESSION['descripcion']))?$_SESSION['descripcion']:"")?></textarea>
	</div>

	<div class="form-group row">
		<label for="etiquetas" class="col-sm-2 col-form-label">Etiquetas</label>
		<textarea type="text" class="col-sm-10 form-control" name="etiquetas" id="etiquetas" rows="5"><?=((!empty($_SESSION['etiquetas']))?$_SESSION['etiquetas']:"")?></textarea>
	</div>

	<div class="form-group row">

		<p class="col-2">Tickets</p>

		<div class="col-10 px-0">

			<div class="row">

				<div class="col">
					<label for="tickets_max" class="col-form-label">Máximo</label>
					<input type="number" class="col form-control pl-0" name="tickets_max" size="3" autofocus id="txtNumero" value="<?=((!empty($_SESSION['tickets_max']))?$_SESSION['tickets_max']:"")?>">
				</div>

				<div class="col">
					<label for="tickets_reservado" class="col-form-label">Reservados</label>
					<input type="number" class="col form-control px-0" name="tickets_reservado" size="3" autofocus id="tickets_reservado" value="<?=((!empty($_SESSION['tickets_reservado']))?$_SESSION['tickets_reservado']:"")?>">
				</div>

				<div class="col">
					<label for="tickets_disponible" class="col-form-label">Disponibles</label>
					<input type="number" class="col form-control px-0" name="tickets_disponible" size="3" autofocus id="tickets_reservado" value="<?=((!empty($_SESSION['tickets_disponible']))?$_SESSION['tickets_disponible']:"")?>">
				</div>

			</div>

		</div>

	</div>

	<div class="form-group row">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
		<label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
		<input type="file" class="col-sm-10 form-control" name="imagen" id="imagen">
	</div>

	<!-- control de origen y accion -->
	<input type="hidden" id="id" name="id" value="<?=((!empty($_SESSION['id']))?$_SESSION['id']:"0")?>" />
	<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?=((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE)?>" />
	<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?=((empty($_SESSION['id']))?'SQL_INSERT':'SQL_UPDATE')?>" />

	<!-- action buttons -->
	<button type="submit" class="btn btn-primary float-sm-right ml-5"><?php echo ((empty($_SESSION['id']))?"Insertar":"Modificar");?></button>
	<button type="button" class="btn btn-danger float-sm-right ml-5" onclick="window.location.assign(((document.location+'').split('?'))[0])">Cancelar</button>

	<script></script>

</form>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>