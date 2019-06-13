-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 06:24:58
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdinventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre_cate` varchar(45) DEFAULT NULL,
  `cate_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre_cate`, `cate_estado`) VALUES
(17, 'Maquinas y Equipos Diversos', 'Activo'),
(25, 'Muebles y Utiles', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre_depar` varchar(45) DEFAULT NULL,
  `depa_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre_depar`, `depa_estado`) VALUES
(191, 'Tesoreria', 'Activo'),
(194, 'inicial (3 años)', 'Activo'),
(195, 'secundaria', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `iddetalleMobiliario` int(11) NOT NULL,
  `DescripMobiliario` varchar(45) DEFAULT NULL,
  `RegisFechaMobi` varchar(45) DEFAULT NULL,
  `CantidadMobi` varchar(45) DEFAULT NULL,
  `EstadoMob` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `Mobiliario_idMobiliario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mobiliario`
--

CREATE TABLE `mobiliario` (
  `idMobiliario` int(11) NOT NULL,
  `nombre_Mobi` varchar(45) DEFAULT NULL,
  `marca_Mobi` varchar(45) DEFAULT NULL,
  `serie_Mobi` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecaRe_Mobi` varchar(45) DEFAULT NULL,
  `comentario` varchar(45) DEFAULT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `idPersona` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partesmobi`
--

CREATE TABLE `partesmobi` (
  `idpartes` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `Mobiliario_idMobili` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('deyvis@gmail.com', '$2y$10$R2SndGVFPhSvG8rc6oNc7ei5jhLUDvCUijWYlcFg3cSMBGbp0RwO6', '2018-10-01 12:13:53'),
('abaya.deyvis@gmail.com', '$2y$10$3FHhvvtCymdllmqxAdVBHeG0TMsK8YjVFJ6..r6FNcfTpUBrgiSUa', '2018-10-02 08:40:45'),
('sonia@gmail.com', '$2y$10$X4acfcOYgY8D629e4mlzrOimYEmj9esfn6EfyZ6F4vKLRqQuGSmYi', '2018-10-02 09:42:47'),
('deyvis@gmail.comm', '$2y$10$2z.MB.pW5j6JS5jI6PVu8uVMqXe31hQagA.HgAR8RRe76HML3NiS2', '2018-10-02 09:46:33'),
('deyvis@gmail.com', '$2y$10$R2SndGVFPhSvG8rc6oNc7ei5jhLUDvCUijWYlcFg3cSMBGbp0RwO6', '2018-10-01 12:13:53'),
('abaya.deyvis@gmail.com', '$2y$10$3FHhvvtCymdllmqxAdVBHeG0TMsK8YjVFJ6..r6FNcfTpUBrgiSUa', '2018-10-02 08:40:45'),
('sonia@gmail.com', '$2y$10$X4acfcOYgY8D629e4mlzrOimYEmj9esfn6EfyZ6F4vKLRqQuGSmYi', '2018-10-02 09:42:47'),
('deyvis@gmail.comm', '$2y$10$2z.MB.pW5j6JS5jI6PVu8uVMqXe31hQagA.HgAR8RRe76HML3NiS2', '2018-10-02 09:46:33'),
('deyvis@gmail.com', '$2y$10$R2SndGVFPhSvG8rc6oNc7ei5jhLUDvCUijWYlcFg3cSMBGbp0RwO6', '2018-10-01 12:13:53'),
('abaya.deyvis@gmail.com', '$2y$10$3FHhvvtCymdllmqxAdVBHeG0TMsK8YjVFJ6..r6FNcfTpUBrgiSUa', '2018-10-02 08:40:45'),
('sonia@gmail.com', '$2y$10$X4acfcOYgY8D629e4mlzrOimYEmj9esfn6EfyZ6F4vKLRqQuGSmYi', '2018-10-02 09:42:47'),
('deyvis@gmail.comm', '$2y$10$2z.MB.pW5j6JS5jI6PVu8uVMqXe31hQagA.HgAR8RRe76HML3NiS2', '2018-10-02 09:46:33'),
('deyvis@gmail.com', '$2y$10$R2SndGVFPhSvG8rc6oNc7ei5jhLUDvCUijWYlcFg3cSMBGbp0RwO6', '2018-10-01 12:13:53'),
('abaya.deyvis@gmail.com', '$2y$10$3FHhvvtCymdllmqxAdVBHeG0TMsK8YjVFJ6..r6FNcfTpUBrgiSUa', '2018-10-02 08:40:45'),
('sonia@gmail.com', '$2y$10$X4acfcOYgY8D629e4mlzrOimYEmj9esfn6EfyZ6F4vKLRqQuGSmYi', '2018-10-02 09:42:47'),
('deyvis@gmail.comm', '$2y$10$2z.MB.pW5j6JS5jI6PVu8uVMqXe31hQagA.HgAR8RRe76HML3NiS2', '2018-10-02 09:46:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_Paterno` varchar(45) DEFAULT NULL,
  `apellido_Materno` varchar(50) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `Fecha_cumple` varchar(45) DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombre`, `apellido_Paterno`, `apellido_Materno`, `telefono`, `dni`, `sexo`, `Fecha_cumple`, `Rol_idRol`, `Departamento_idDepartamento`) VALUES
(45, 'deyvis', 'garcia', 'cercado', '97944', 48762828, 'Masculino', '10/10/2018', 1, 167),
(52, 'salva', 'torres', 'barsola', '43343', 3434343, 'Masculino', '11/21/2018', 1, 168),
(54, 'Salva', 'barzola', 'Torres', '12321', 50356343, 'Masculino', '11/16/2018', 1, 167),
(55, 'pepe', 'barzola', 'tprres', '42342', 234234234, 'Masculino', '11/23/2018', 1, 167),
(56, 'bertha', 'torres', 'amaya', '83233', 3243332, 'Femenino', '11/10/2018', 2, 181),
(58, 'cesar', 'liberato', 'Gomez', '91232', 64235234, 'Masculino', '11/10/2018', 2, 167),
(59, 'Itamar', 'N', 'B', '92321', 5646321, 'Femenino', '11/10/2018', 1, 181),
(60, 'kevin', 'ricon', 'qwsa', '89878', 7897897, 'Masculino', '11/10/2018', 2, 167),
(61, 'deyvis', 'garcia', 'cercado', '37373', 48762828, 'Masculino', '11/21/2018', 1, 167),
(62, 'leidy', 'hasdas', 'sadasdas', '32131', 21321312, 'Femenino', '11/16/2018', 1, 181),
(64, 'william', '2qqwewqe', 'aaaaaaaaaaaaaaaa', '32432', 32423423, 'Masculino', '11/22/2018', 2, 167),
(65, 'gerson', 'luna', 'espinoza', '34234', 4324234, 'Femenino', '11/08/2018', 2, 188),
(66, 'Salvatore', 'Barzola', 'Torres', '32132', 2321321, 'Masculino', '10/16/2018', 1, 188),
(67, 'puto', 'asdasdas', 'dadasd', '112121212', 12121212, 'Masculino', '11/13/2018', 2, 167),
(68, 'Diana', 'sanchez', 'Torpoco', '930419414', 48256342, 'Femenino', '11/15/2018', 2, 182),
(71, 'Erika', 'Hurtado', 'Huaringa', '993566425', 10133535, 'Femenino', '09/25/2015', 1, 191),
(72, 'Marisol', 'asadas', 'asdasd', '994811888', 46650607, 'Femenino', '11/15/1980', 2, 194),
(73, 'Bertha', 'Torres', 'Amaya', '934123416', 38923249, 'Femenino', '11/13/1970', 1, 195);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Responsable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `Persona_idPersona`, `remember_token`, `idRol`, `username`, `imagen`) VALUES
(62, 'salvacho@gmail.com', '$2y$10$Np7kga/Jz2zcpFFCRQlGKOEyr7QKxMX8IdDAba4uWjUSFJgQ8hDvu', 66, 'dmzJxO5p7hPdX1HppknhBH6BGsPK1mPZ9UEL8i93Icgi9gUYkK3Xfr1KnWu7', 1, 'salvatore', 'salva.jpg'),
(67, 'eriquita_35@gmail.com', '$2y$10$uc5dnnw0Dwvoug2xg/QUre22.csk/NcNjgTSYyyQkXUouk4pHrx/m', 71, 'BhVjU7j1CUaTysYzHNIrzm145zGpAX8kajmaiELNAzTI9qHyYfKbPupsR6W7', 1, 'erika', 'erika.JPG'),
(68, 'marisol@gmail.com', '$2y$10$avvAVGCrQ62j2gBly3ML8.RewnDfGX7jwRlhw/3lMLdijUpfJH3nG', 72, 'bc6ax9rAQ48VJJUXKwpweTjWvqSodq3TWOs0jxemNDXfrcA1axYuHxEWwxcD', 2, 'marisol', 'marisol.JPG'),
(69, 'bertha@gmail.com', '$2y$10$qZPBb3/kXL4kFh.yOY0RpOu8jelQxfAHttrQckGpeC7RSeIBbFcnG', 73, NULL, 1, 'bertha', 'bertha.JPG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`iddetalleMobiliario`),
  ADD KEY `fk_detalleMobiliario_Persona1_idx` (`Persona_idPersona`),
  ADD KEY `fk_detalleMobiliario_Mobiliario1_idx` (`Mobiliario_idMobiliario`);

--
-- Indices de la tabla `mobiliario`
--
ALTER TABLE `mobiliario`
  ADD PRIMARY KEY (`idMobiliario`),
  ADD KEY `fk_Mobiliario_Departamento1_idx` (`Departamento_idDepartamento`),
  ADD KEY `fk_Mobiliario_categoria1_idx` (`categoria_idcategoria`);

--
-- Indices de la tabla `partesmobi`
--
ALTER TABLE `partesmobi`
  ADD PRIMARY KEY (`idpartes`),
  ADD KEY `Mobiliario_idMobili` (`Mobiliario_idMobili`),
  ADD KEY `Mobiliario_idMobili_2` (`Mobiliario_idMobili`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Persona_Rol1_idx` (`Rol_idRol`),
  ADD KEY `fk_Persona_Departamento1_idx` (`Departamento_idDepartamento`),
  ADD KEY `Rol_idRol` (`Rol_idRol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_Persona1_idx` (`Persona_idPersona`),
  ADD KEY `Persona_idPersona` (`Persona_idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `iddetalleMobiliario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mobiliario`
--
ALTER TABLE `mobiliario`
  MODIFY `idMobiliario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partesmobi`
--
ALTER TABLE `partesmobi`
  MODIFY `idpartes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `fk_detalleMobiliario_Mobiliario1` FOREIGN KEY (`Mobiliario_idMobiliario`) REFERENCES `mobiliario` (`idMobiliario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalleMobiliario_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mobiliario`
--
ALTER TABLE `mobiliario`
  ADD CONSTRAINT `fk_Mobiliario_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mobiliario_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Departamento1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
