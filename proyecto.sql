-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 07:07 AM
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
  `Fecha` date NOT NULL,
  `Medico` enum('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `id_extraescolar`, `ApellidoP`, `ApellidoM`, `Nombre`, `Correo`, `Genero`, `Matricula`, `Carrera`, `Cuatrimestre`, `Turno`, `Fecha`, `Medico`) VALUES
(1, 1, 'Acosta', 'Segovia', 'Harry D\'anniel', '202400194@uproo.edu.mx', 'Masculino', '202400194', 'Ingeniería en Tecnologías de la Información e Innovación Digital', 'Tercero', 'Matutino', '2025-07-25', 'No');

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
(1, 1, '202400194', '1234', 1);

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
-- Indexes for table `extraescolar`
--
ALTER TABLE `extraescolar`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extraescolar`
--
ALTER TABLE `extraescolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_extraescolar`) REFERENCES `extraescolar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
