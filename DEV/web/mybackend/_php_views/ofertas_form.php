<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - DB Data conection
include_once("../php_librarys/db.php"); 
// - - - - - Pokemon functions
include_once("../php_librarys/functions_pokedex.php"); 
// - - - - - General SETs
include_once("../php_controllers/generalSet.php"); 

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Load General Tables Data =>

// 'tipos' => array( 'id', 'nombre' )
$TipoAry = GetIdedArray( getDataes( "tipos", 0 ) );

// 'regiones' => array( 'id' => 0, 'nombre' => '' )
$RegioAry = GetIdedArray( getDataes( "regiones", 0 ) );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Load General Tables Data //

session_start();	// genera array asociativo con los datos de sesion

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokémon</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

	<!-- Les característiques de la navbar són les següents:
	En el brand de la navbar ha de sortir la imatge pokeball.png i la paraula pokedex.
	Ha de tenir un menú Datos maestros que ha de ser un desplegable amb l’opció Pokémons. -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<a class="navbar-brand" href="../index.php">
			<img src="../media/img/pokeball.png" class="rounded float-left mr-3" style="width: 50px; height: 50px;" />
			<h1 class="navbar-text text-white h2">Pokedex</h1>
		</a>

		<ul class="navbar-nav mr-auto pt-2 ml-2">
		<li class="nav-item dropdown h4">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datos maestros</a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			<li class="dropdown-item" href="#"><a href="pokemon_list.php">Pokémons</a></li>
			</ul>
		</li>
		</ul>

	</nav>

	<!-- Ha de ser un formulari vertical.
	S’ha de donar format a tots els inputs per tenir l’aspecte que es mostra del formulari.
	S’ha de crear una card amb capçalera i cos.  A la capaçalera insertarem la imatge pikachu.png amb 
	una grandaria de 50x50 i el text Pokémon. Al cos de la card anirà el formulari. -->
	<div class="container">
		<div class="card mt-2">
			<div class="card-header bg-secondary">
				<img src="../media/img/pikachu.png" class="rounded float-left mr-3" style="width: 50px; height: 50px;" />
				<h2 class="text-white ml-2 pt-2">Pokémon</h2>
			</div>
			<div class="card-body">

			<form action="../php_controllers/pokemonControler.php?idAction=<?php echo ((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE);?>" method="POST" target="_self" enctype="multipart/form-data">

				<!-- Número. Una label  i un input de tipus tex pel número i un input de tipus text. 
				La longitud màxima del text ha de ser de 3, el cursor ha de sortir col·locat al input 
				i ha de tenir un text explicatiu de l’input. -->
				<div class="form-group row">
					<label for="txtNumero" class="col-sm-2 col-form-label">Número</label>
					<input type="text" class="col-sm-10 form-control" name="txtNumero" size="3" autofocus id="txtNumero" placeholder="Introduce el número" value="<?php echo ((!empty($_SESSION['numero']))?$_SESSION['numero']:"");?>">
				</div>

				<!-- Nombre. Una label i un input text pel nom. Ha de tenir un text explicatiu de l’input. -->
				<div class="form-group row">
					<label for="txtNombre" class="col-sm-2 col-form-label">Nombre</label>
					<input type="text" class="col-sm-10 form-control" name="txtNombre" id="txtNombre" value="<?php echo ((!empty($_SESSION['nombre']))?$_SESSION['nombre']:"");?>">
				</div>

				<!-- Región. Una label i un desplegable per la regió. Les opcions possibles del desplegable 
				han de ser: Kanto, Jotho, Hoenn, Sinnoh i Teselia.
				La regió ha de ser un select menu custom. -->
				<div class="form-group row">
					<label for="cbxRegion" class="col-sm-2 col-form-label">Región</label>
					<div class="col-sm-10 px-0">
						<select name="cbxRegion" id="cbxRegion" class="custom-select">
							<?php // - - - - - Regiones
							// 'regiones' => array( 'id' => 0, 'nombre' => '' )
							foreach( $RegioAry as $theK => $theD ) {
							?><option value="<?php echo $theD['id']; ?>"<?php echo ((!empty($_SESSION['regiones_id']) && $_SESSION['regiones_id']==$theD['id'])?" selected":""); ?>><?php echo $theD['nombre']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<!-- Tipo. Una label pel tipus i un ckeckbox i una label per cada tipus. Els tipus han de 
				ser: Planta, Veneno,Fuego, Volador, Agua, Eléctrico, Hada, Bicho, Lucha, Psíquico.
				El tipus és un checkbox costumitzat. -->
				<div class="form-group row">
					<label for="txtEvolucion" class="col-sm-2 col-form-label">Tipo</label>
					<div class="col-sm-10 px-0">
						<?php // - - - - - Tipos
						$tmpAry = array();
						if ( !empty( $_SESSION["tipos"] ) ) {
							foreach( $_SESSION["tipos"] as $tmpData ) {
								$tmpAry[$tmpData['tipos_id']] = $tmpData['tipos_id'];
							}
						}
						// 'tipos' => array( 'id', 'nombre' )
						foreach( $TipoAry as $theK => $theD ) {
							?><div class="custom-control custom-radio custom-control-inline px-0">
							<input type="checkbox" name="chxTipo[]" class="mt-1" value="<?php echo $theD['id']; ?>"<?php 
							echo ((!empty($tmpAry[$theK]))?" checked":""); 
							?>>
							<label for="chxPlanta" class="ml-2"><?php echo $theD['nombre']; ?></label>
						</div><?php } ?>
					</div>
				</div>

				<!-- Altura. Una label i un input numèric per l’alçada. L’alçada mínima ha de ser 1. 
				Tant l’alçada com el pes són input groups.-->
				<div class="form-group row">
					<label for="txtAltura" class="col-sm-2 col-form-label">Altura</label>
					<input type="number" min="1" class="col-sm-10 form-control" name="txtAltura" id="txtAltura" value="<?php echo ((!empty($_SESSION['altura']))?$_SESSION['altura']:"");?>">
				</div>

				<!-- Peso. Una label i un input numèric pel pes. El pes no pot ser negatiu i ha de tenir 
				com a màxim 2 decimals. 
				Tant l’alçada com el pes són input groups. -->
				<div class="form-group row">
					<label for="txtPeso" class="col-sm-2 col-form-label">Peso</label>
					<input type="number" min="0" step=".01" class="col-sm-10 form-control" name="txtPeso" id="txtPeso" value="<?php echo ((!empty($_SESSION['peso']))?$_SESSION['peso']:"");?>">
				</div>

				<!-- Evolución. Una label per l’Evolució i un radio i una label per cada evolució. Les 
				possibles evolucions són: Sense evolució, Primera evolución, Otras evoluciones. 
				L’evolució és un radio costum. $_SESSION['peso'] -->
				<div class="form-group row">
					<label for="txtEvolucion" class="col-sm-2 col-form-label">Evolución</label>
					<div class="col-sm-10 px-0">
						<div class="custom-control custom-radio custom-control-inline px-0">
							<input type="radio" name="txtEvolucion" id="rbSin" class="mt-1" value="Sin evolucionar"<?php 
							echo ((empty($_SESSION['evolucion']) || $_SESSION['evolucion']=="Sin evolucionar")?"checked":"");
							?>>
							<label for="rbSin" class="ml-2">Sin evolución</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline px-0">
							<input type="radio" name="txtEvolucion" id="rbPrimera" class="mt-1" value="Primera evolución"<?php 
							echo ((!empty($_SESSION['evolucion']) && $_SESSION['evolucion']=="Primera evolución")?"checked":"");
							?>>
							<label for="rbPrimera" class="ml-2">Primera evolución</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline px-0">
							<input type="radio" name="txtEvolucion" id="rbOtras" class="mt-1" value="Otras evoluciones"<?php 
							echo ((!empty($_SESSION['evolucion']) && $_SESSION['evolucion']=="Otras evoluciones")?"checked":"");
							?>>
							<label for="rbOtras" class="ml-2">Otras evoluciones</label>
						</div>
					</div>
				</div>

				<!-- Imagen. Una label para Imagen i un input para seleccionar un fichero. 
				La imatge és browser custom. -->
				<div class="form-group row">
					<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
					<label for="nptImagen" class="col-sm-2 col-form-label">Imagen</label>
					<input type="file" class="col-sm-10 form-control" name="nptImagen" id="nptImagen">
				</div>

				<!-- control de origen y accion -->
				<input type="hidden" id="numId" name="numId" value="<?php echo ((!empty($_SESSION['id']))?$_SESSION['id']:"0");?>">
				<input type="hidden" id="idOriginAction" name="idOriginAction" value="<?php echo ((empty($_SESSION['id']))?SQL_INSERT:SQL_UPDATE);?>">
				<input type="hidden" id="txtOriginAction" name="txtOriginAction" value="<?php echo ((empty($_SESSION['id']))?'SQL_INSERT':'SQL_UPDATE');?>">

				<!-- Un botó de submit amb el text Aceptar y un link amb el text Cancelar.
				Al botó Aceptar ha de ser un botó primary i el link cancel•lar ha de tenir l’aspecte d’un botó secondary. -->
				<button type="submit" class="btn btn-primary float-sm-right ml-2"><?php echo ((empty($_SESSION['id']))?"Insert":"Update");?></button>
				<button type="reset" class="btn btn-secondary float-sm-right ml-2">Reiniciar</button>
				<button type="button" class="btn btn-danger float-sm-right ml-2" onclick="window.location.assign('pokemon_list.php')">Cancelar</button>

			</form>
		</div>
	</div>

	<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>