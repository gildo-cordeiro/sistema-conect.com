-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2018 às 01:48
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `usuario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `arquivo`, `data`, `usuario`) VALUES
(1, 'gildo.duartec@gmail.com.jpg', '2018-10-21 15:00:23', 'gildo.duartec@gmail.com'),
(5, 'mhenrique008@gmail.com.png', '2018-10-21 15:08:06', 'mhenrique008@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `nome` varchar(15) NOT NULL,
  `sobreNome` varchar(35) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`nome`, `sobreNome`, `cpf`, `tel`, `email`, `senha`, `adm`) VALUES
('Gildo', 'Cordeiro Duarte', '707.545.684-90', '84991557032', 'gildocordeiro2.0@gmail.com', '123', 1),
('Layane', 'Carolaine da Silva Sena', '000.000.000-00', '84499155703', 'layanesena2013@gmail.com', '123', 1),
('Lucas', 'Gomes Pereira', '111.111.111-11', '84991557032', 'llucasgomes008@gmail.com', '123', 0),
('Matheus', 'Henrique Estevam', '707.545.684-90', '85992345678', 'mhenrique00@gmail.com', '12345', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcperfi`
--

CREATE TABLE `funcperfi` (
  `id` int(11) NOT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `usuario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcperfi`
--

INSERT INTO `funcperfi` (`id`, `arquivo`, `data`, `usuario`) VALUES
(20, 'mhenrique00@gmail.com.png', '2018-10-21 15:26:55', 'mhenrique00@gmail.com'),
(46, 'gildocordeiro2.0@gmail.com.jpg', '2018-11-25 03:22:27', 'gildocordeiro2.0@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(15) NOT NULL,
  `sobreNome` varchar(35) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `estado` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `sobreNome`, `cpf`, `tel`, `cep`, `estado`, `endereco`, `cidade`, `email`, `senha`) VALUES
('Gildo', 'Cordeiro Duarte', '707.545.684-99', '84499155703', '59215-000', 'RN', 'Rua 15 de Novembro', 'Nova Cruz', 'gildo.duartec@gmail.com', '123'),
('Layane', 'Carolaine da Silva Sena', '000.000.000-00', '84499155703', '59215-000', 'RN', 'Rua 15 de Novembro', 'Nova Cruz', 'layanesena2013@gmail.com', '1234'),
('Matheus', 'Henrique Estevam', '808.656.789-40', '85992345678', '59215-000', 'RN', 'Rua da Goiba, 191, Centro', 'Nova Cruz', 'mhenrique008@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `funcperfi`
--
ALTER TABLE `funcperfi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funcperfi`
--
ALTER TABLE `funcperfi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`email`);

--
-- Limitadores para a tabela `funcperfi`
--
ALTER TABLE `funcperfi`
  ADD CONSTRAINT `funcperfi_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `funcionario` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
