-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2017 a las 18:59:46
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diablo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(2) UNSIGNED NOT NULL,
  `nombre_clase` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto_clase` varchar(254) COLLATE utf8_spanish_ci DEFAULT 'img/clases/default_class.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `id_guia` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `texto_comentario` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('habilitado','deshabilitado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conjunto`
--

CREATE TABLE `conjunto` (
  `id_conjunto` int(4) UNSIGNED NOT NULL,
  `nombre_conjunto` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `efectos_conjuntos`
--

CREATE TABLE `efectos_conjuntos` (
  `id_conjunto` int(4) UNSIGNED NOT NULL,
  `num_requisito` int(1) UNSIGNED NOT NULL,
  `efecto_conjunto` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `efectos_legendarios`
--

CREATE TABLE `efectos_legendarios` (
  `id_objeto` int(5) NOT NULL,
  `efecto_objeto` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id_guia` int(10) UNSIGNED NOT NULL,
  `nombre_guia` varchar(70) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_clase` int(2) UNSIGNED NOT NULL,
  `estado_guia` enum('publica','privada','deshabilitada') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_habilidad`
--

CREATE TABLE `guia_habilidad` (
  `id_guia` int(10) UNSIGNED NOT NULL,
  `id_habilidad` int(4) UNSIGNED NOT NULL,
  `id_runa` int(6) UNSIGNED DEFAULT NULL,
  `posicion` enum('a1','a2','a3','a4','a5','a6','p1','p2','p3','p4') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_objeto`
--

CREATE TABLE `guia_objeto` (
  `id_guia` int(10) UNSIGNED NOT NULL,
  `posicion` enum('cabeza','hombros','amuleto','torso','munecas','mano','cintura','piernas','pies','anillo1','anillo2','arma','mano_izquierda','arma_cubo','armadura_cubo','joyeria_cubo','gema1','gema2','gema3') COLLATE utf8_spanish_ci NOT NULL,
  `id_objeto` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidad`
--

CREATE TABLE `habilidad` (
  `id_habilidad` int(4) UNSIGNED NOT NULL,
  `nombre_habilidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_habilidad` enum('activa','pasiva') COLLATE utf8_spanish_ci NOT NULL,
  `id_clase` int(2) UNSIGNED NOT NULL,
  `descripcion_habilidad` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `foto_habilidad` varchar(254) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img/habilidades/default_ability.png',
  `estado` enum('habilitada','deshabilitada') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'habilitada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `id_objeto` int(5) UNSIGNED NOT NULL,
  `nombre_objeto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_clase` int(2) UNSIGNED NOT NULL,
  `tipo_objeto` int(2) UNSIGNED NOT NULL,
  `rareza` enum('normal','legendario','conjunto') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'normal',
  `foto_objeto` varchar(254) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img/objetos/default_item.png',
  `estado` enum('habilitado','deshabilitado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'habilitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto_conjunto`
--

CREATE TABLE `objeto_conjunto` (
  `id_objeto` int(5) UNSIGNED NOT NULL,
  `id_conjunto` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_leyenda`
--

CREATE TABLE `puntos_leyenda` (
  `id_guia` int(10) UNSIGNED NOT NULL,
  `estadistica` enum('estad_principal','vitalidad','v_movimiento','recurso_max','v_ataque','reduccion_enfr','prob_golpe_crit','dano_golpe_crit','vida','armadura','todas_resist','regeneracion_vida','dano_area','reduc_coste_Recur','vida_por_golpe','hallazgo_oro') COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` enum('1','2','3','4') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `runa`
--

CREATE TABLE `runa` (
  `id_runa` int(6) UNSIGNED NOT NULL,
  `id_habilidad` int(4) UNSIGNED NOT NULL,
  `nombre_runa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_runa` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `foto_runa` varchar(254) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img/runas/default_rune.png',
  `estado` enum('habilitada','deshabilitada') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'habilitada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_objeto`
--

CREATE TABLE `tipo_objeto` (
  `cod_tipo_obj` int(2) UNSIGNED NOT NULL,
  `nombre_tipo_obj` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `categoria_obj` enum('cabeza','hombros','torso','munecas','manos','cintura','piernas','pies','mano_izquierda','una_mano','dos_manos','a_distancia','anillo','amuleto','gema') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `email` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` enum('administrador','usuario') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'usuario',
  `foto_usuario` varchar(254) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img/usuarios/default_user_icon.png',
  `estado` enum('habilitado','deshabilitado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'habilitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto_positivo`
--

CREATE TABLE `voto_positivo` (
  `id_voto` int(10) UNSIGNED NOT NULL,
  `id_guia` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `clase_nombre_unique` (`nombre_clase`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `conjunto`
--
ALTER TABLE `conjunto`
  ADD PRIMARY KEY (`id_conjunto`);

--
-- Indices de la tabla `efectos_legendarios`
--
ALTER TABLE `efectos_legendarios`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id_guia`),
  ADD KEY `fk_guia_usuario` (`id_usuario`),
  ADD KEY `fk_guia_clase` (`id_clase`);

--
-- Indices de la tabla `habilidad`
--
ALTER TABLE `habilidad`
  ADD PRIMARY KEY (`id_habilidad`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id_objeto`),
  ADD UNIQUE KEY `objeto_nombre_unique` (`nombre_objeto`);

--
-- Indices de la tabla `objeto_conjunto`
--
ALTER TABLE `objeto_conjunto`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Indices de la tabla `runa`
--
ALTER TABLE `runa`
  ADD PRIMARY KEY (`id_runa`);

--
-- Indices de la tabla `tipo_objeto`
--
ALTER TABLE `tipo_objeto`
  ADD PRIMARY KEY (`cod_tipo_obj`),
  ADD UNIQUE KEY `tipo_obj_nombre_unique` (`nombre_tipo_obj`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `voto_positivo`
--
ALTER TABLE `voto_positivo`
  ADD PRIMARY KEY (`id_voto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conjunto`
--
ALTER TABLE `conjunto`
  MODIFY `id_conjunto` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id_guia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `habilidad`
--
ALTER TABLE `habilidad`
  MODIFY `id_habilidad` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `runa`
--
ALTER TABLE `runa`
  MODIFY `id_runa` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
