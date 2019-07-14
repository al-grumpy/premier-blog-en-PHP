CREATE TABLE `comment` (
    `id` int(11) NOT NULL,
    `pseudo` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `date_added` date NOT NULL,
    `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`id`, `pseudo`, `content`, `date_added`, `article_id`) VALUES
(1, 'Moi', 'je suis un commentaire', '2019-07-08', 1),
(2, 'Lui', 'je suis un commentaire également', '2019-07-08', 1),
(3, 'Lui', 'je suis un commentaire aussi', '2019-07-08', 1);

ALTER TABLE `comment`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_article_id` (`article_id`);

ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `COMMENT`
ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);