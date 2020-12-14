<?php 

$servername = "rdbms.strato.de";
$username = "U4358841";
$password = "Grup@1DAW2B_!";
$myDB = "DB4358841";
   
$dbTableAry = array (
    'comerc' => array (
        'tableName' => 'comerc', 
        'tableType' => 0, 
        'tablekey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'direccion' => array( 'fieldName' => 'direccion', 'fieldType' => 'varchar', 'fieldLong' => 150, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'telefono' => array( 'fieldName' => 'telefono', 'fieldType' => 'varchar', 'fieldLong' => 9, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'email' => array( 'fieldName' => 'email', 'fieldType' => 'varchar', 'fieldLong' => 70, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'intro' => array( 'fieldName' => 'intro', 'fieldType' => 'varchar', 'fieldLong' => 250, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'descripcion' => array( 'fieldName' => 'descripcion', 'fieldType' => 'text', 'fieldLong' => 0, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'tickets_max' => array( 'fieldName' => 'tickets_max', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'tickets_disponible' => array( 'fieldName' => 'tickets_disponible', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'tickets_reservado' => array( 'fieldName' => 'tickets_reservado', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            )
        ),
    'juego' => array (
        'tableName' => 'juego', 
        'tableType' => 0, 
        'tablekey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'puntuacion_max' => array( 'fieldName' => 'puntuacion_max', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'orden' => array( 'fieldName' => 'orden', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' )
            )
        ),
    'oferta' => array (
        'tableName' => 'oferta', 
        'tableType' => 0, 
        'tablekey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'id_comerc' => array( 'fieldName' => 'id_comerc', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => 'comerc', 'relationKey' => 'id' ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'valor' => array( 'fieldName' => 'valor', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'puntos' => array( 'fieldName' => 'puntos', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            )
        ),
    'partida' => array (
        'tableName' => 'partida', 
        'tableType' => 1, 
        'tablekey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'id_juego' => array( 'fieldName' => 'id_juego', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'id_usuario' => array( 'fieldName' => 'id_usuario', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'puntuacion_tot' => array( 'fieldName' => 'puntuacion_tot', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' )
            )
        ),
    'ticket' => array (
        'tableName' => 'ticket', 
        'tableType' => 1, 
        'tablekey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'char', 'fieldLong' => 128, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'id_comerc' => array( 'fieldName' => 'id_comerc', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'id_usuario' => array( 'fieldName' => 'id_usuario', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'fecha_emision' => array( 'fieldName' => 'fecha_emision', 'fieldType' => 'int', 'fieldLong' => 10, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'fecha_canje' => array( 'fieldName' => 'fecha_canje', 'fieldType' => 'int', 'fieldLong' => 10, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' )
            )
        ),
    'usuario' => array (
        'tableName' => 'usuario', 
        'tableType' => 0, 
        'tablekey' => '',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'email' => array( 'fieldName' => 'email', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'password' => array( 'fieldName' => 'password', 'fieldType' => 'varchar', 'fieldLong' => 128, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' ),
            'puntuacion' => array( 'fieldName' => 'puntuacion', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '' )
            )
        )
    );

?>