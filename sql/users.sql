CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `pseudo` varchar(255) NOT NULL,
    `droit` varchar(255) NOT NULL,
    `pass` varchar(40) NOT NULL,
    `email` varchar(255) NOT NULL,
    `date_inscription` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `user`
ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;