-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 06:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--
CREATE DATABASE IF NOT EXISTS proyecto CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE proyecto;
-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `id_extraescolar` int(11) NOT NULL,
  `ApellidoP` varchar(25) NOT NULL,
  `ApellidoM` varchar(25) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `Matricula` varchar(9) NOT NULL,
  `Carrera` enum('Ingeniería en Tecnologías de la Información e Innovación Digital','Ingeniería en Biotecnología','Ingeniería Biomedica','Ingeniería Financiera','Licenciatura en Administración','Terapia Física') NOT NULL,
  `Cuatrimestre` enum('Tercero','Sexto','Noveno') NOT NULL,
  `Turno` enum('Matutino','Vespertino') NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Medico` enum('Si','No') NOT NULL,
  `asistencia` int(11) NOT NULL,
  `falta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `id_extraescolar`, `ApellidoP`, `ApellidoM`, `Nombre`, `Correo`, `Genero`, `Matricula`, `Carrera`, `Cuatrimestre`, `Turno`, `Fecha`, `Medico`, `asistencia`, `falta`) VALUES
(1, 1, 'Acosta', 'Segovia', 'Harry D\'anniel', '202400194@upqroo.edu.mx', 'Masculino', '202400194', 'Ingeniería en Tecnologías de la Información e Innovación Digital', 'Tercero', 'Matutino', '2025-07-25', 'No', 10, 0),
(3, 1, 'Cristina', 'Acosta', 'Segovia', '202400195@upqroo.edu.mx', 'Femenino', '202400195', 'Ingeniería en Tecnologías de la Información e Innovación Digital', 'Tercero', 'Matutino', '2025-07-30', 'No', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `avisos`
--

CREATE TABLE `avisos` (
  `id` int(11) NOT NULL,
  `id_extraescolar` int(11) NOT NULL,
  `aviso` varchar(255) NOT NULL,
  `fecha_act` date DEFAULT NULL,
  `actividad` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `partido` varchar(255) NOT NULL,
  `estado` enum('Activa','Inactiva') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avisos`
--

INSERT INTO `avisos` (`id`, `id_extraescolar`, `aviso`, `fecha_act`, `actividad`, `fecha`, `partido`, `estado`) VALUES
(2, 1, 'lluvia mañana', '2025-07-23', 'borrar la cuenta', '2025-07-31', 'partidito mañana', 'Inactiva');

-- --------------------------------------------------------

--
-- Table structure for table `extraescolar`
--

CREATE TABLE `extraescolar` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Profesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extraescolar`
--

INSERT INTO `extraescolar` (`id`, `Nombre`, `Profesor`) VALUES
(1, 'Danza', 'Mariana Torres Ramírez'),
(2, 'Fútbol', 'Luis Alberto Ramírez López'),
(3, 'Escolta', 'Beatriz Elena Luna Morales '),
(4, 'Voleibol', 'Karla Sofía Méndez Castro'),
(5, 'Basquetbol', 'Fernando Alejandro Aguilar Méndez'),
(6, 'Taekwondo', 'Diana Carolina Rojas Vega'),
(7, 'Atletismo', 'Omar Javier Castillo Herrera'),
(8, 'Ajedrez', 'Rodrigo Emiliano Salinas Cruz'),
(9, 'Vacio', 'Vacio');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `id_extraescolar` int(11) NOT NULL,
  `lunes` varchar(25) DEFAULT NULL,
  `martes` varchar(25) DEFAULT NULL,
  `miercoles` varchar(25) DEFAULT NULL,
  `jueves` varchar(25) DEFAULT NULL,
  `viernes` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `id_extraescolar`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`) VALUES
(1, 1, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `id_extraescolar` int(11) NOT NULL,
  `apellidoP` varchar(20) NOT NULL,
  `apellidoM` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id`, `id_extraescolar`, `apellidoP`, `apellidoM`, `nombre`, `correo`) VALUES
(2, 1, 'Ruiz', 'Hernandez', 'Ricardo Armando', 'ricardoruiz@upqroo.edu.mx');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `acceso` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `inscrito` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `acceso`, `nombre`, `contraseña`, `inscrito`) VALUES
(1, 1, '202400194', '1234', 1),
(2, 2, 'ricardo', '1234', 0),
(3, 1, '202400195', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_extraescolar` (`id_extraescolar`);

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_extraescolar` (`id_extraescolar`);

--
-- Indexes for table `extraescolar`
--
ALTER TABLE `extraescolar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_extraescolar` (`id_extraescolar`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_extraescolar` (`id_extraescolar`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extraescolar`
--
ALTER TABLE `extraescolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_extraescolar`) REFERENCES `extraescolar` (`id`);

--
-- Constraints for table `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`id_extraescolar`) REFERENCES `extraescolar` (`id`),
  ADD CONSTRAINT `avisos_ibfk_2` FOREIGN KEY (`id`) REFERENCES `profesores` (`id`);

--
-- Constraints for table `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_extraescolar`) REFERENCES `extraescolar` (`id`);

--
-- Constraints for table `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`id_extraescolar`) REFERENCES `extraescolar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
