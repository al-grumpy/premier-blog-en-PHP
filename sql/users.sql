CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `pseudo` varchar(255) NOT NULL,
    `mail` varchar(255) NOT NULL,
    `password` varchar(40) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`,`pseudo`,`mail`,`password`) VALUES
(1, 'Ed Nygma', 'ednygma@mail.com', 'hommeMystere'),
(2, 'Oswald Cobblepot', 'cobblepot@mail.com', 'pingouin'),
(3, 'Don Falcone', 'falcone@mail.com', 'mafia');

ALTER TABLE `user`
ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;