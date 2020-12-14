<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including =>

// - - - - - DB Data conection
include("../php_librarys/db.php"); 
// - - - - - Pokemon functions
include("../php_librarys/functions_pokedex.php"); 
// - - - - - General SETs
include("../php_controllers/generalSet.php"); 

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Including //

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon List</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
</head>
<body>

<!-- Aquesta página ha de tenir la mateixa navbar de la pàgina pokemon.php. ==>>
Les característiques de la navbar són les següents:
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

<!-- Té un div contenidor on hi ha una taula amb les següents columnes: -->
<div class="container-fluid">

    <div class="row my-2">

    
        <?php 

        // 'pokemons' => array( 'id' => 0,'numero' => 0,'nombre' => '','altura' => 0,'peso' => 0,'evolucion' => '','imagen' => '','regiones_id' => 0 )
        $PokemonsAry = GetIdedArray( getDataes( "pokemons", 0 ) );
        // 'tipos' => array( 'id', 'nombre' )
        $TipoAry = GetIdedArray( getDataes( "tipos", 0 ) );
        // 'regiones' => array( 'id' => 0, 'nombre' => '' )
        $RegioAry = GetIdedArray( getDataes( "regiones", 0 ) ); 

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 
        
        if ( !empty( $PokemonsAry ) ) {

            foreach( $PokemonsAry as $theKey => $theData ) {
                // pokemons [ 0.'id', 1.'numero', 2.'nombre', 3.'altura', 4.'peso', 5.'evolucion', 6.'imagen', 7.'regiones_id' ]
                // tipos_has_pokemons [ 0.'tipos_id', 1.'pokemons_id' ]
                // 'tipos' => array( 'id', 'nombre' )
                // regiones [ 0.'id', 1.'nombre' )

                $HasTipoAry = GetIdedArray( getDataes( "tipos_has_pokemons", $theKey ) );
        ?>

        <div class="col col-2 card bg-white text-white mx-2 px-0  d-flex flex-column">

            <?php 
            $imgSrc = "../media/img/uploaded/".$theData['imagen'];
            if ( empty( $theData['imagen'] ) || !file_exists( $imgSrc ) ) { $imgSrc = "../media/img/noimage.png"; }
            ?><img class="card-img img-fluid" src="<?php echo $imgSrc; ?>" alt="<?php echo $theData['nombre']?>" />

            <p class="h5 text-dark px-2"><?php echo $theData['numero']." - ".$theData['nombre']?></p>

            <!-- S’ha de mostrar un Badge per cadascun del tipus del pokemon. -->
            <div class="d-flex flex-wrap px-2 mb-2"><?php 
                foreach( $HasTipoAry as $theDataTipo ) { 
                    echo '<div class="btn btn-primary mr-2 mb-2 px-1 py-0 btn-sm">'.$TipoAry[$theDataTipo['tipos_id']]['nombre'].'</div>';
                } 
            ?></div>

            <div class="mt-auto p-2 card-footer d-flex flex-row align-items-end justify-content-end">

                <!-- Un formulari que ha d’incloure un botó de submit outline primari, i amb la icona d’editar,  i un input amagat on 
                es guardi l’id del pokemon. Aquest botó de submit ha d’enviar les dades per POST a pokemonControler.php. -->
                <form action="../php_controllers/pokemonControler.php" method="POST" target="_self">
                    <input type="hidden" id="idPokemon" name="idPokemon" value="<?php echo $theData['id'];?>">
                    <input type="hidden" id="idAction" name="idAction" value="<?php echo SQL_UPDATE;?>">
                    <button type="submit" class="p-2 btn border-secondary text-dark w-20 p-20 ml-2">
                        <svg style="fill: var( --dark)" class="text-dark" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 576 512" enable-background="0 0 576 512">
                        <!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>
                        </svg>
                    </button>
                </form>

                <!-- Un formulari que ha d’incloure un botó de submit outline danger, i amb la icona de trash,  i un input amagat on 
                es guardi l’id del pokemon. Aquest botó de submit ha d’enviar les dades per POST a pokemonControler.php. -->
                <form action="../php_controllers/pokemonControler.php" method="POST" target="_self">
                    <input type="hidden" id="idPokemon" name="idPokemon" value="<?php echo $theData['id'];?>">
                    <input type="hidden" id="idAction" name="idAction" value="<?php echo SQL_DELETE;?>">
                    <button type="submit" class="p-2 btn border-danger text-danger w-20 p-20 ml-2">
                        <svg style="fill: var( --danger)" class="text-danger" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 448 512" enable-background="0 0 448 512">
                        <!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"/>
                        </svg>
                    </button>
                </form>

            </div>


        </div>

    <?php

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat =>  
            
        }
        
    }

    ?>

    </div>

    <!-- També té un link a pokemon.php. Aquest link ha de tenir l’aspecte d’un botó success gran i circular, 
    amb la icona plus. Al seu posicionament ha de ser fix i ha d’estar a 10px de la dreta i 10px de la part 
    de sota. A més el seu z-index ha de ser de 100. -->
    <a href="../php_controllers/pokemonControler.php?idAction=<?php echo SQL_INSERT;?>" target="_self" style="display: block; position: fixed; right: 10px; bottom: 10px; width: auto; height: auto; padding: 10px; background-color: var(--primary); border-radius: 25px; z-index:100;">
    <svg style="fill: var( --white)" class="text-danger" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 448 512" enable-background="0 0 448 512">
            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
        </svg>
    </a>

    <?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>