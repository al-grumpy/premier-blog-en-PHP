CREATE TABLE `article` (
    `id` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `chapo` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `author` varchar(255) NOT NULL,
    `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`,`title`,`chapo`,`content`,`author`,`date_added`) VALUES
(1, 'Premier article à trouver!', 'du texte pour présenter le présenter', 'son contenu, à réfléchir comment mettre en page', 'Alexia Seurot', '2019-06-24'),
(2, 'deuxième article à trouver', 'je ne sais pas du tout quoi mettre, mais il va falloir trouver!', 'le contenu de ce que je ne sais pas quoi mettre, mais que je vais trouver!!!', 'Alexia Seurot', '2019-06-24'),
(3, 'troisième article à trouver!', 'La peur est le chemin vers le côté obscur', 'la peur mène à la colère, la colère mène à la haine, la haine ... mène à la souffrance.', 'Alexia Seurot', '2019-06-24');

ALTER TABLE `article`
ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;