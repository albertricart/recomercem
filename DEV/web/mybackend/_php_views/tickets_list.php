<?php

// - - - - - - - - - - get Comerc Data
$EntitiesAry = GetIdedArray( getEntity( "ticket", 0, 0 ) );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat => 
?>

<ul class="list-group list-group-flush">

<?
if ( !empty( $EntitiesAry ) ) {

    foreach( $EntitiesAry as $theKey => $theData ) {

?>

    <li class="list-group-item">

    <div class="container">

        <div class="row">
            
            <!-- nombre entidad -->
            <div class="col-10 h5 text-dark px-2"><?=$theData['nombre'].' <span class="h6">(id #'.$theData['id'].')</span>'?></div>

            <div class="col-1">

                <!-- opcion Modificar -->
                <form action="<?=$scriptName?>.html" method="POST" target="_self">
                    <input type="hidden" id="entityId" name="entityId" value="<?php echo $theData['id'];?>">
                    <input type="hidden" id="idAction" name="idAction" value="<?php echo SQL_UPDATE;?>">
                    <button type="submit" class="p-2 btn border-secondary text-dark w-20 p-20 ml-2">
                        <svg style="fill: var( --dark)" class="text-dark" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 576 512" enable-background="0 0 576 512">
                        <!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>
                        </svg>
                    </button>
                </form>

            </div>

            <div class="col-1">

                <!-- opcion Eliminar -->
                <form action="<?=$scriptName?>.html" method="POST" target="_self">
                    <input type="hidden" id="entityId" name="entityId" value="<?php echo $theData['id'];?>">
                    <input type="hidden" id="idAction" name="idAction" value="<?php echo SQL_DELETE;?>">
                    <button type="submit" class="p-2 btn border-danger text-danger w-20 p-20 ml-2">
                        <svg style="fill: var( --danger)" class="text-danger" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 448 512" enable-background="0 0 448 512">
                        <!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"/>
                        </svg>
                    </button>
                </form>

            </div>

        </div>

    </li>

<?php

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - repeat =>  
        
    }
    
}

?>

</ul>

<!-- opcion Agregar -->    
<?php if ( $enableNew ) { ?>
<a href="<?=$scriptName?>.html?idAction=<?php echo SQL_INSERT;?>" target="_self" style="display: block; position: fixed; right: 10px; bottom: 10px; width: auto; height: auto; padding: 10px; background-color: var(--primary); border-radius: 25px; z-index:100;">
<svg style="fill: var( --white)" class="text-danger" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 448 512" enable-background="0 0 448 512">
        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
    </svg>
</a>
<?php } ?>

<?php if ( !empty( $_REQUEST['retu'] ) ) { echo '<script>alert("'.$_REQUEST['retu'].'")</script>'; } ?>
