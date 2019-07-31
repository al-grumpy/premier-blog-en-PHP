CREATE TABLE `membre` (
    `id` int(11) NOT NULL,
    `pseudo` varchar(255) NOT NULL,
    `mail` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `membre`
ADD PRIMARY KEY (`id`);

ALTER TABLE `membre`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;