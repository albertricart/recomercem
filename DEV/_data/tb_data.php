<?php 
   
$dbTableAry = array (
    'comerc' => array (
        'tableName' => 'comerc', 
        'tableCode' => 'CO', 
        'tableType' => 0, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'cid' => array( 'fieldName' => 'cid', 'fieldType' => 'char', 'fieldLong' => 13, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'active' => array( 'fieldName' => 'active', 'fieldType' => 'tinyint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'tipo' => array( 'fieldName' => 'tipo', 'fieldType' => 'smallint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'direccion' => array( 'fieldName' => 'direccion', 'fieldType' => 'varchar', 'fieldLong' => 150, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'telefono' => array( 'fieldName' => 'telefono', 'fieldType' => 'varchar', 'fieldLong' => 9, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'email' => array( 'fieldName' => 'email', 'fieldType' => 'varchar', 'fieldLong' => 70, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'password' => array( 'fieldName' => 'password', 'fieldType' => 'varchar', 'fieldLong' => 128, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => true ),
            'intro' => array( 'fieldName' => 'intro', 'fieldType' => 'varchar', 'fieldLong' => 250, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'descripcion' => array( 'fieldName' => 'descripcion', 'fieldType' => 'text', 'fieldLong' => 0, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'etiquetas' => array( 'fieldName' => 'etiquetas', 'fieldType' => 'text', 'fieldLong' => 0, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'tickets_max' => array( 'fieldName' => 'tickets_max', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'tickets_disponible' => array( 'fieldName' => 'tickets_disponible', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'tickets_reservado' => array( 'fieldName' => 'tickets_reservado', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            )
        ),
    'tipo_comercio' => array (
        'tableName' => 'tipo_comercio', 
        'tableCode' => '',
        'tableType' => 1, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'active' => array( 'fieldName' => 'active', 'fieldType' => 'tinyint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'descripcion' => array( 'fieldName' => 'descripcion', 'fieldType' => 'varchar', 'fieldLong' => 250, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false )
            )
        ),
    'juego' => array (
        'tableName' => 'juego', 
        'tableCode' => 'GA', 
        'tableType' => 0, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'cid' => array( 'fieldName' => 'cid', 'fieldType' => 'char', 'fieldLong' => 13, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'active' => array( 'fieldName' => 'active', 'fieldType' => 'tinyint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'descripcion' => array( 'fieldName' => 'descripcion', 'fieldType' => 'varchar', 'fieldLong' => 250, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'puntuacion_max' => array( 'fieldName' => 'puntuacion_max', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'orden' => array( 'fieldName' => 'orden', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false )
            )
        ),
    'oferta' => array (
        'tableName' => 'oferta', 
        'tableCode' => 'OF',         
        'tableType' => 0, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'cid' => array( 'fieldName' => 'cid', 'fieldType' => 'char', 'fieldLong' => 13, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'active' => array( 'fieldName' => 'active', 'fieldType' => 'tinyint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'id_comerc' => array( 'fieldName' => 'id_comerc', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => 'comerc', 'relationKey' => 'id', 'crypt' => false ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'descripcion' => array( 'fieldName' => 'descripcion', 'fieldType' => 'varchar', 'fieldLong' => 250, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'valor' => array( 'fieldName' => 'valor', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'puntos' => array( 'fieldName' => 'puntos', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            )
        ),
    'partida' => array (
        'tableName' => 'partida', 
        'tableCode' => '',
        'tableType' => 1, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'id_juego' => array( 'fieldName' => 'id_juego', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'id_usuario' => array( 'fieldName' => 'id_usuario', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'puntuacion_tot' => array( 'fieldName' => 'puntuacion_tot', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false )
            )
        ),
    'ticket' => array (
        'tableName' => 'ticket', 
        'tableCode' => '',
        'tableType' => 1, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'cid' => array( 'fieldName' => 'cid', 'fieldType' => 'char', 'fieldLong' => 13, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'id_comerc' => array( 'fieldName' => 'id_comerc', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'id_usuario' => array( 'fieldName' => 'id_usuario', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'fecha_emision' => array( 'fieldName' => 'fecha_emision', 'fieldType' => 'int', 'fieldLong' => 10, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'fecha_canje' => array( 'fieldName' => 'fecha_canje', 'fieldType' => 'int', 'fieldLong' => 10, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false )
            )
        ),
    'usuario' => array (
        'tableName' => 'usuario', 
        'tableCode' => '',
        'tableType' => 0, 
        'tableKey' => 'id',
        'tableDef' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4',
        'tableFields' => array (
            'id' => array( 'fieldName' => 'id', 'fieldType' => 'int', 'fieldLong' => 11, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'cid' => array( 'fieldName' => 'cid', 'fieldType' => 'char', 'fieldLong' => 13, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'active' => array( 'fieldName' => 'active', 'fieldType' => 'tinyint', 'fieldLong' => 1, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'nombre' => array( 'fieldName' => 'nombre', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'email' => array( 'fieldName' => 'email', 'fieldType' => 'varchar', 'fieldLong' => 50, 'fieldDef' => 'NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false ),
            'password' => array( 'fieldName' => 'password', 'fieldType' => 'varchar', 'fieldLong' => 128, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => true ),
            'puntuacion' => array( 'fieldName' => 'puntuacion', 'fieldType' => 'smallint', 'fieldLong' => 5, 'fieldDef' => 'UNSIGNED NOT NULL', 'relationTable' => '', 'relationKey' => '', 'crypt' => false )
            )
        )

    );

    

?>