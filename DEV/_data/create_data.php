<?php

$databaseAry = array();

$databaseAry[] = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
'START TRANSACTION;';
'SET time_zone = "+00:00";';

$databaseAry[] = 'CREATE TABLE `comerc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(70) NOT NULL,
  `intro` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `tickets_max` smallint(5) UNSIGNED NOT NULL,
  `tickets_disponible` smallint(5) UNSIGNED NOT NULL,
  `tickets_reservado` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'CREATE TABLE `juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `puntuacion_max` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'CREATE TABLE `oferta` (
  `id` int(11) NOT NULL,
  `id_comerc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'CREATE TABLE `partida` (
  `id_juego` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `puntuacion_tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'CREATE TABLE `ticket` (
  `id` char(40) NOT NULL,
  `id_comerc` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_emision` int(10) UNSIGNED NOT NULL,
  `fecha_canje` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `puntuacion` smallint(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

$databaseAry[] = 'ALTER TABLE `comerc` 
  ADD PRIMARY KEY (`id`);';

$databaseAry[] = 'ALTER TABLE `juego` 
  ADD PRIMARY KEY (`id`);';

$databaseAry[] = 'ALTER TABLE `oferta` 
  ADD PRIMARY KEY (`id`), 
  ADD KEY `id_comerc` (`id_comerc`);';

$databaseAry[] = 'ALTER TABLE `partida` 
  ADD KEY `id_juego` (`id_juego`) USING BTREE, 
  ADD KEY `id_usuario` (`id_usuario`);';

$databaseAry[] = 'ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comerc` (`id_comerc`),
  ADD KEY `id_usuario` (`id_usuario`);';

$databaseAry[] = 'ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);';

$databaseAry[] = 'ALTER TABLE `usuario` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;';

$databaseAry[] = 'ALTER TABLE `oferta` 
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`id_comerc`) REFERENCES `comerc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;';

$databaseAry[] = 'ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partida_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;';

$databaseAry[] = 'ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_comerc`) REFERENCES `comerc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;';

$databaseAry[] = 'COMMIT;';

?>