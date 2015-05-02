<?php

include_once("constants.php");

try {
	$conn = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DROP DATABASE IF EXISTS " . DATABASE . ";
			CREATE DATABASE " . DATABASE . ";
			USE " . DATABASE . ";
			--
			-- Tabellenstruktur für Tabelle `category`
			--

			CREATE TABLE IF NOT EXISTS `category` (
			`id` int(8) NOT NULL,
			  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `name` varchar(20) NOT NULL,
			  `user_id` int(8) NOT NULL
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

			--
			-- Daten für Tabelle `category`
			--

			INSERT INTO `category` (`id`, `timestamp`, `name`, `user_id`) VALUES
			(7, '2015-04-30 21:57:36', 'Animals', 103),
			(8, '2015-04-30 21:57:45', 'Food', 103),
			(9, '2015-04-30 21:57:55', 'Technology', 103),
			(11, '2015-04-30 21:58:33', 'Music', 103);

			-- --------------------------------------------------------

			--
			-- Tabellenstruktur für Tabelle `entry`
			--

			CREATE TABLE IF NOT EXISTS `entry` (
			`id` int(8) NOT NULL,
			  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `title` varchar(40) NOT NULL,
			  `content` varchar(1000) NOT NULL,
			  `user_id` int(8) NOT NULL,
			  `topic_id` int(8) NOT NULL
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

			--
			-- Daten für Tabelle `entry`
			--

			INSERT INTO `entry` (`id`, `timestamp`, `title`, `content`, `user_id`, `topic_id`) VALUES
			(1, '2015-04-30 22:02:15', 'Guitars', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 12),
			(2, '2015-04-30 22:06:34', 'Sssssssss', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 6),
			(3, '2015-04-30 22:06:43', 'Panda', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 7),
			(4, '2015-04-30 22:06:57', 'Nomnomnom', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 9),
			(5, '2015-04-30 22:07:09', 'Moooooh!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 10),
			(6, '2015-04-30 22:07:19', 'Programming', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 103, 11),
			(7, '2015-05-01 17:11:53', 'Drums', 'ba-dum-tss', 104, 12),
			(8, '2015-05-02 19:19:59', 'Grizzly', 'Roaaaarrrrr', 104, 7),
			(9, '2015-05-02 19:20:19', 'Icebear', 'Roaaaar, but cold.', 104, 7);

			-- --------------------------------------------------------

			--
			-- Tabellenstruktur für Tabelle `error`
			--

			CREATE TABLE IF NOT EXISTS `error` (
			`id` int(11) NOT NULL,
			  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `errormessage` varchar(400) NOT NULL
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

			-- --------------------------------------------------------

			--
			-- Tabellenstruktur für Tabelle `topic`
			--

			CREATE TABLE IF NOT EXISTS `topic` (
			`id` int(8) NOT NULL,
			  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `name` varchar(20) NOT NULL,
			  `category_id` int(8) NOT NULL,
			  `user_id` int(8) NOT NULL
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

			--
			-- Daten für Tabelle `topic`
			--

			INSERT INTO `topic` (`id`, `timestamp`, `name`, `category_id`, `user_id`) VALUES
			(6, '2015-04-30 21:58:59', 'Snakes', 7, 103),
			(7, '2015-04-30 21:59:18', 'Bears', 7, 103),
			(9, '2015-04-30 21:59:54', 'Vegetables', 8, 103),
			(10, '2015-04-30 22:00:22', 'Meat', 8, 103),
			(11, '2015-04-30 22:00:37', 'IT', 9, 103),
			(12, '2015-04-30 22:01:09', 'Rock', 11, 103);

			-- --------------------------------------------------------

			--
			-- Tabellenstruktur für Tabelle `user`
			--

			CREATE TABLE IF NOT EXISTS `user` (
			`id` int(8) NOT NULL,
			  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `name` varchar(20) NOT NULL,
			  `password` varchar(250) NOT NULL,
			  `role` varchar(12) NOT NULL
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

			--
			-- Daten für Tabelle `user`
			--

			INSERT INTO `user` (`id`, `timestamp`, `name`, `password`, `role`) VALUES
			(103, '2015-04-30 21:40:37', 'Ferdinand', '$2y$10$1R4qU67lFBs8v32QdUIqNeCilt5r5qp.dMmAPB6eBjEzXW33.Qfr.', 'admin'),
			(104, '2015-05-01 16:59:29', 'admin1', '$2y$10\$r0ujFYDkoQ.2E8Hr6RQaeuoUbaVOe0MeWH7fKpjL4Cxkh6/QupT9i', 'admin');

			--
			-- Indexes for dumped tables
			--

			--
			-- Indexes for table `category`
			--
			ALTER TABLE `category`
			 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

			--
			-- Indexes for table `entry`
			--
			ALTER TABLE `entry`
			 ADD PRIMARY KEY (`id`), ADD KEY `author_id` (`user_id`), ADD KEY `topic_id` (`topic_id`);

			--
			-- Indexes for table `error`
			--
			ALTER TABLE `error`
			 ADD PRIMARY KEY (`id`);

			--
			-- Indexes for table `topic`
			--
			ALTER TABLE `topic`
			 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `user_id` (`user_id`);

			--
			-- Indexes for table `user`
			--
			ALTER TABLE `user`
			 ADD PRIMARY KEY (`id`);

			--
			-- AUTO_INCREMENT for dumped tables
			--

			--
			-- AUTO_INCREMENT for table `category`
			--
			ALTER TABLE `category`
			MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
			--
			-- AUTO_INCREMENT for table `entry`
			--
			ALTER TABLE `entry`
			MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
			--
			-- AUTO_INCREMENT for table `error`
			--
			ALTER TABLE `error`
			MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
			--
			-- AUTO_INCREMENT for table `topic`
			--
			ALTER TABLE `topic`
			MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
			--
			-- AUTO_INCREMENT for table `user`
			--
			ALTER TABLE `user`
			MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
			--
			-- Constraints der exportierten Tabellen
			--

			--
			-- Constraints der Tabelle `category`
			--
			ALTER TABLE `category`
			ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

			--
			-- Constraints der Tabelle `entry`
			--
			ALTER TABLE `entry`
			ADD CONSTRAINT `entry_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
			ADD CONSTRAINT `entry_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

			--
			-- Constraints der Tabelle `topic`
			--
			ALTER TABLE `topic`
			ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
			ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
			";

	// Execute SQL
	$conn->exec($sql);
	echo "Database created successfully<br>";
} catch (PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}
