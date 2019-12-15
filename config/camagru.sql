SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `exemple` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exemple`;

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `time_stamp` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `like_it` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `new_password` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `time` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `mail` text NOT NULL,
  `passwd` text NOT NULL,
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_confirmation` (
  `id` int(11) NOT NULL,
  `numero_unique` int(11) NOT NULL,
  `login` text NOT NULL,
  `mail` text NOT NULL,
  `passwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `like_it`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `new_password`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_confirmation`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `like_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `new_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
