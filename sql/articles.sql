CREATE TABLE `article` (
    `id` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `chapo` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `author` varchar(255) NOT NULL,
    `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `article`
ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

