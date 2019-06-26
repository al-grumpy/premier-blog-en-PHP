CREATE TABLE `comment` (
    `id` int(11) NOT NULL,
    `pseudo` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `date_added` date NOT NULL,
    `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `comment`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_article_id` (`article_id`);

ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `COMMENT`
ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);