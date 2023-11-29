--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Fev-2023 às 13:51
-- Versão do servidor: 10.11.4-MariaDB
-- versão do PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imc_db`
--
CREATE DATABASE imc_db;
USE imc_db;

-------------------------------------------------------
--
-- Estrutura da tabela `pacientes`
--
CREATE TABLE `pacientes` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CPF` varchar(12) NOT NULL,
  `CONTATO` int(11) NOT NULL,
  `DATA_COLETA` datetime NOT NULL,
  `ALTURA` float NOT NULL,
  `PESO` float NOT NULL,
  `IMC` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Criando e adicionando privilégios ao usuário `imc_user`
--
GRANT ALL PRIVILEGES ON imc_db TO 'imc_user'@'%' IDENTIFIED BY 'password';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;