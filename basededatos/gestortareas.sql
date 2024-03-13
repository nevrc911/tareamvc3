-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 02:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestortareas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `diaNumero` tinyint(31) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `cumplida` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `dia`, `diaNumero`, `mes`, `descripcion`, `cumplida`, `id_usuario`) VALUES
(21, 'Jueves', 7, 'Marzo', 'Llamar a cliente a las 2 de la tarde', 0, 24),
(22, 'Jueves', 7, 'Marzo', 'Dar de comer al perro a las  17:00', 0, 24),
(23, 'Viernes', 8, 'Marzo', 'Ir a la feria a las 11:00', 0, 24),
(24, 'Lunes', 20, 'Abril', 'Ir al dentista a las 15:00', 0, 24),
(25, 'Viernes', 7, 'Junio', 'LLamar a cliente a las 14:00', 0, 24),
(34, 'Lunes', 29, 'Abril', 'Dibujar plano', 0, 24),
(35, 'Lunes', 29, 'Marzo', 'Ir al dentista', 0, 25),
(36, 'Martes', 20, 'Marzo', 'Lllamar cliente ', 0, 27),
(37, 'Jueves', 25, 'Abril', 'hacer el aceo', 0, 27);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `password`) VALUES
(24, 'Andres', 'Gonzales Mondaca', 'andres@gmail.com', '123456'),
(25, 'Marcela', 'Barrera muñoz', 'marcela@gmail.com', 'marcela'),
(26, 'Matias', 'gonzales muños', 'matias@gmail.com', '123456'),
(27, 'Carlos', 'Muñoz fuentes', 'carlos@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
