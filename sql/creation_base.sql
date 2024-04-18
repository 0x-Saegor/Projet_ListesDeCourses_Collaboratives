-- Création de la BDD
CREATE DATABASE IF NOT EXISTS `liste_course`;
USE `liste_course`;

-- Création de la table recipes
CREATE TABLE IF NOT EXISTS `list` (
    `list_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(128) NOT NULL,
    `author` varchar(255) NOT NULL,
    `access` varchar(255) NOT NULL,
    PRIMARY KEY (`list_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de la table users
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `full_name` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `content` (
    `content_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(128) NOT NULL,
    `author_id` int(11) NOT NULL,
    `list_id` int(11) NOT NULL,
    PRIMARY KEY (`content_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

delete from `users`;
insert into `users` (`email`, `full_name`, `password`, `user_id`) values ('mickael.andrieu@exemple.com', 'Mickaël Andrieu', 'devine', 1);
insert into `users` (`email`, `full_name`, `password`, `user_id`) values ('arthurleg29@gmail.com', 'Arthur Le Gall', 'coucou', 2);

delete from `list`;
insert into `list` (`author`, `list_id`, `title`, `access`) values ('mickael.andrieu@exemple.com', 1, 'Liste vacances', 'a:2:{i:0;i:1;i:1;i:2;}');
insert into `list` (`author`, `list_id`, `title`, `access`) values ('mickael.andrieu@exemple.com', 2, 'Liste repas de famille', 'a:2:{i:0;i:1;i:1;i:2;}');
insert into `list` (`author`, `list_id`, `title`, `access`) values ('arthurleg29@gmail.com', 3, 'Liste semaine 10 avril', 'a:2:{i:0;i:1;i:1;i:2;}');

delete from `content`;
insert into `content` (`title`, `author_id`, `list_id`, `content_id`) values ('Brique de lait', 1,  1, 1);
insert into `content` (`title`, `author_id`, `list_id`, `content_id`) values ('Champignons', 2, 3, 2);
