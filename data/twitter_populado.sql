-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 04:47 PM
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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `mensagem_privada`
--

CREATE TABLE `mensagem_privada` (
  `id_mensagem_privada` int(11) NOT NULL,
  `id_usuario_remente` int(11) NOT NULL,
  `id_usuario_destinatario` int(11) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data_envio` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mensagem_privada`
--

INSERT INTO `mensagem_privada` (`id_mensagem_privada`, `id_usuario_remente`, `id_usuario_destinatario`, `conteudo`, `data_envio`) VALUES
(1, 1, 2, 'Olá admin2!', '2025-05-24 11:46:56'),
(2, 2, 3, 'Ei moderador!', '2025-05-24 11:46:56'),
(3, 4, 5, 'E aí user2!', '2025-05-24 11:46:56'),
(4, 5, 1, 'Olá admin1!', '2025-05-24 11:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anexo` varchar(50) DEFAULT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_usuario`, `conteudo`, `data_postagem`, `anexo`, `likes`) VALUES
(1, 1, 'Post do admin1 - 1', '2025-05-24 11:46:56', NULL, 10),
(2, 1, 'Post do admin1 - 2', '2025-05-24 11:46:56', NULL, 7),
(3, 1, 'Post do admin1 - 3', '2025-05-24 11:46:56', NULL, 5),
(4, 2, 'Post do admin2 - 1', '2025-05-24 11:46:56', NULL, 8),
(5, 2, 'Post do admin2 - 2', '2025-05-24 11:46:56', NULL, 2),
(6, 2, 'Post do admin2 - 3', '2025-05-24 11:46:56', NULL, 4),
(7, 3, 'Post do mod1 - 1', '2025-05-24 11:46:56', NULL, 6),
(8, 3, 'Post do mod1 - 2', '2025-05-24 11:46:56', NULL, 3),
(9, 3, 'Post do mod1 - 3', '2025-05-24 11:46:56', NULL, 5),
(10, 4, 'Post do user1 - 1', '2025-05-24 11:46:56', NULL, 1),
(11, 4, 'Post do user1 - 2', '2025-05-24 11:46:56', NULL, 0),
(12, 4, 'Post do user1 - 3', '2025-05-24 11:46:56', NULL, 2),
(13, 5, 'Post do user2 - 1', '2025-05-24 11:46:56', NULL, 0),
(14, 5, 'Post do user2 - 2', '2025-05-24 11:46:56', NULL, 1),
(15, 5, 'Post do user2 - 3', '2025-05-24 11:46:56', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_resposta`
--

CREATE TABLE `post_resposta` (
  `id_post_resposta` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data_postagem` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anexo` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_resposta`
--

INSERT INTO `post_resposta` (`id_post_resposta`, `id_post`, `id_usuario`, `conteudo`, `data_postagem`, `anexo`, `likes`) VALUES
(1, 1, 3, 'Comentário do moderador no post 1', '2025-05-24 11:46:56', '', 2),
(2, 4, 4, 'Comentário do user1 no post 4', '2025-05-24 11:46:56', '', 1),
(3, 7, 5, 'Comentário do user2 no post 7', '2025-05-24 11:46:56', '', 0),
(4, 10, 1, 'Comentário do admin1 no post 10', '2025-05-24 11:46:56', '', 3),
(5, 13, 2, 'Comentário do admin2 no post 13', '2025-05-24 11:46:56', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_topico`
--

CREATE TABLE `post_topico` (
  `id_post_topico` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_topico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_topico`
--

INSERT INTO `post_topico` (`id_post_topico`, `id_post`, `id_topico`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 1),
(6, 6, 2),
(7, 7, 3),
(8, 8, 4),
(9, 9, 1),
(10, 10, 2),
(11, 11, 3),
(12, 12, 4),
(13, 13, 1),
(14, 14, 2),
(15, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topico`
--

CREATE TABLE `topico` (
  `id_topico` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topico`
--

INSERT INTO `topico` (`id_topico`, `nome`) VALUES
(1, 'Tecnologia'),
(2, 'Esportes'),
(3, 'Filmes e Séries'),
(4, 'Educação');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `tipo` enum('normal','moderador','admin') NOT NULL DEFAULT 'normal',
  `nickname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo`, `nickname`, `email`, `senha`) VALUES
(1, 'admin', 'admin1', 'admin1@email.com', 'senha123'),
(2, 'admin', 'admin2', 'admin2@email.com', 'senha123'),
(3, 'moderador', 'mod1', 'mod1@email.com', 'senha123'),
(4, 'normal', 'user1', 'user1@email.com', 'senha123'),
(5, 'normal', 'user2', 'user2@email.com', 'senha123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensagem_privada`
--
ALTER TABLE `mensagem_privada`
  ADD PRIMARY KEY (`id_mensagem_privada`),
  ADD KEY `remetente` (`id_usuario_remente`),
  ADD KEY `destinatario` (`id_usuario_destinatario`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `post_resposta`
--
ALTER TABLE `post_resposta`
  ADD PRIMARY KEY (`id_post_resposta`),
  ADD KEY `resposta_post` (`id_post`),
  ADD KEY `resposta_usuario` (`id_usuario`);

--
-- Indexes for table `post_topico`
--
ALTER TABLE `post_topico`
  ADD PRIMARY KEY (`id_post_topico`),
  ADD KEY `pt_post` (`id_post`),
  ADD KEY `pt_topico` (`id_topico`);

--
-- Indexes for table `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`id_topico`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensagem_privada`
--
ALTER TABLE `mensagem_privada`
  MODIFY `id_mensagem_privada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post_resposta`
--
ALTER TABLE `post_resposta`
  MODIFY `id_post_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_topico`
--
ALTER TABLE `post_topico`
  MODIFY `id_post_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topico`
--
ALTER TABLE `topico`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mensagem_privada`
--
ALTER TABLE `mensagem_privada`
  ADD CONSTRAINT `destinatario` FOREIGN KEY (`id_usuario_destinatario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remetente` FOREIGN KEY (`id_usuario_remente`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_resposta`
--
ALTER TABLE `post_resposta`
  ADD CONSTRAINT `resposta_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `resposta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Constraints for table `post_topico`
--
ALTER TABLE `post_topico`
  ADD CONSTRAINT `pt_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pt_topico` FOREIGN KEY (`id_topico`) REFERENCES `topico` (`id_topico`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
