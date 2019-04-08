SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `articles` (`id`, `titre`, `description`, `prix`) VALUES
(1, 'Une paire d ecouteurs', 'Pour ecouter de la musique en toute tranquilite', 8.55),
(2, 'Une bonne grosse banane', 'Pour manger ou autres plaisirs', 4.21),
(3, 'Une voiture pour nain', 'Meme Tyrion a le droit de conduire', 10000),
(4, 'Planche a repasser avec des roulettes', 'Ideale pour les amateurs de skateboard', 28.99),
(5, 'Un set de jeu de paume', 'Pour les fans de l ancien temps', 19.99),
(6, 'Un avion avec trois ailes', 'Pour voler aussi en diagonale', 1000000),
(7, 'Un pingoleon shiney', 'Niveau 100 le bougre c est une bonne affaire', 4.99),
(8, 'Lfouilla', 'Pour bien reussir vos piscines', 99.99),
(9, 'Adele', 'Pour avoir le bocal dans sa poche', 999.98),
(10, 'Un Conrodri sauvage', 'Il apparait a droite et a gauche', 58.78),
(11, 'Ein Volk ein Reich ein Fuhrer', 'Me demandez pas ce que ca veut dire j en sais rien', 12.98),
(12, 'Le dernier CD d Orelsan en braille', 'Les sourds peuvent aussi chanter et danser', 26),
(14, 'Un Pokemon', 'Que vous dire de plus', 1.99);


CREATE TABLE `article_categorie` (
  `article_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 4),
(5, 2),
(6, 2),
(6, 4),
(7, 7),
(7, 2),
(8, 2),
(8, 3),
(8, 5),
(8, 2),
(9, 3),
(9, 7),
(10, 3),
(10, 4),
(11, 2),
(11, 2),
(12, 1),
(12, 2),
(12, 3),
(13, 2),
(14, 6);

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Musique'),
(2, '???'),
(3, 'Useful stuff'),
(4, 'Moyen de locomotion'),
(5, 'Objet insolite'),
(6, 'Pokemon'),
(7, 'Aliments');

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commande` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `commandes` (`id`, `user_id`, `commande`, `date_commande`) VALUES
(1, 1, '[{\"id\":\"4\",\"titre\":\"Une paire d ecouteur\",\"description\":\"Pour ecouter de la musique en toute tranquilite\",\"prix\":\"12\",\"quantite\":1}]', '2019-04-07 19:32:35'),
(3, 3, '[{\"id\":\"5\",\"titre\":\"Un set de jeu de paume\",\"description\":\"Pour les fans de l ancien temps\",\"prix\":\"19.99\",\"quantite\":1},{\"id\":\"7\",\"titre\":\"Un pingoleon shiney\",\"description\":\"Niveau 100 le bougre c est une bonne affaire\",\"prix\":\"4.99\",\"quantite\":1},{\"id\":\"14\",\"titre\":\"Un Pokemon\",\"description\":\"Que vous dire de plus\",\"prix\":\"1.99\",\"quantite\":2},{\"id\":\"11\",\"titre\":\"Ein Volk ein Reich ein Fuhrer\",\"description\":\"Me demandez pas ce que ca veut dire j en sais rien\",\"prix\":\"12.98\",\"quantite\":1},{\"id\":\"2\",\"titre\":\"Une bonne grosse banane\",\"description\":\"Pour manger ou autres plaisirs\",\"prix\":\"4.21\",\"quantite\":1}]', '2019-04-07 20:19:11');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'John', 'DOE', 'admin@ftminishop.fr', '$2y$10$0HcjXhpaqqJaZQ5fjHBGEOVAyTQNfSlEAPw3SiDa1zzezQyijj2pa', 'admin'),
(2, 'Floryne', 'TOURRET', 'floryne.tourret@gmail.com', '$2y$10$0zdPrL.kS1xFGCk2ZAuCNuoSWZs6ty0EbEB/UlW6GBavGW0b3G6M6', 'user'),
(3, 'Frederic', 'LEONARD', 'lettoh08@gmail.com', '$2y$10$UVoC3Nun7f2j1qEbzD8Zxuf5NqEGGR0e37jTroTOs6Rdr7rn2AvHK', 'user');

ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
