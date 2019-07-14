CREATE TABLE `article` (
    `id` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `chapo` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `author` varchar(255) NOT NULL,
    `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`,`title`,`chapo`,`content`,`author`,`date_added`) VALUES
(1, 'Premier article', 'texte de présentation 1er article', 'contenu du premier article', 'Alexia Seurot', '2019-06-24'),
(2, 'deuxième article', 'texte de présentation 2ème article', 'contenu du 2ème article', 'Alexia Seurot', '2019-06-24'),
(3, 'troisième article', 'texte de présentation 3ème article', 'contenu du 3ème article', 'Alexia Seurot', '2019-06-24');

ALTER TABLE `article`
ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;