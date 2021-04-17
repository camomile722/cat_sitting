-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 08. Apr 2021 um 20:33
-- Server-Version: 5.7.32
-- PHP-Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `cat-sitting`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cats`
--

INSERT INTO `cats` (`id`, `name`, `district`, `link`, `image`, `created_at`) VALUES
(1, 'Lisa', 'Rahlstedt', '/lisa', 'img-6.png', '2021-04-04 21:54:39'),
(2, 'Maus', 'Billstedt', '/maus', 'img-7.png', '2021-04-04 21:10:56'),
(3, 'MAu MAu', 'Jenfeld', '/maumau', 'img-8.png', '2021-04-04 21:13:56'),
(4, 'Lulu', 'Hammerbrook', '/lulu', 'foto.jpg', '2021-04-04 21:00:57');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body_comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`id`, `body_comment`, `post_id`, `user_id`, `created_at`) VALUES
(1, 'Super!', 60, 5, '2021-03-22 09:35:46'),
(2, 'SuperDanke! )Wo kann ich solche Sachen kaufen?', 61, 5, '2021-03-22 09:35:46'),
(3, 'Ein sehr interessanter Beitrag! Vielen Dank! :))', 60, 3, '2021-03-22 10:30:53'),
(4, 'Ja Toll!', 61, 3, '2021-03-22 10:30:53'),
(8, 'Toller Rücksack! Wo kann ich den kaufen?', 70, 7, '2021-03-30 11:33:19'),
(10, 'Top!', 72, 7, '2021-03-30 13:48:04'),
(11, 'Süß)', 70, 16, '2021-04-07 18:36:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `headers`
--

CREATE TABLE `headers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `headers`
--

INSERT INTO `headers` (`id`, `title`) VALUES
(1, 'Hey Katzenliebhaber!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `icons`
--

INSERT INTO `icons` (`id`, `name`, `link`, `image`) VALUES
(1, 'facebook', 'https://facebook.com', '5056-4869-facebook-f-brands.svg'),
(2, 'twitter', 'https://twitter.com', 'twitter-brands.svg'),
(3, 'instagram', 'https://www.instagram.com/', 'instagram-brands.svg'),
(4, 'email', 'alla.brusova@gmail.com', 'envelope-regular.svg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(1, '4403-logo-blau.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `navs`
--

CREATE TABLE `navs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `navs`
--

INSERT INTO `navs` (`id`, `name`, `link`) VALUES
(1, 'home', '/home'),
(3, 'Katzensitter finden', '/catsitters'),
(4, 'Katzensitter werden', '/users/register'),
(6, 'blog', '/posts');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`id`, `image`) VALUES
(1, '7827-img-4.png'),
(2, '3671-img-5.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `user_id`, `image`, `title_image`) VALUES
(60, 'Spielzeuge für Katze', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum...', '2021-03-21 19:21:55', 5, 'spiell2.jpg', 'spielzeug_katze'),
(61, 'Beste Katzenhäuser', 'Beste Katzenhäuser sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum...', '2021-03-21 19:24:06', 5, 'haus.jpg', 'haus'),
(70, 'Tolle Reise zusammen', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2021-03-25 18:26:40', 5, 'reise.jpg', 'reise');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `rating` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `text`, `rating`, `created_at`) VALUES
(1, 7, 'Ich bin wirklich sehr zufrieden, meine Katze hat mich überhaupt nicht vermisst! Vielen Dank für Foto- und Videoberichte, das war sehr toll! Ich konnte mich einfach im Urlaub entspannen!', 5, '2021-04-07 08:38:31'),
(2, 15, 'Vielen Dank)', 4.5, '2021-04-01 19:55:56');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `sliders`
--

INSERT INTO `sliders` (`id`, `image_1`, `image_2`, `image_3`) VALUES
(1, '4594-img-1.png', '9522-img-2.jpg', '9553-liebe.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `text`, `image`, `created_at`) VALUES
(1, 12, 'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'img-9.jpg', '2021-04-05 13:49:07'),
(2, 15, 'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'img-10.jpg', '2021-04-05 13:49:07'),
(3, 7, 'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'img-11.jpg', '2021-04-05 13:49:07'),
(4, 10, 'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'img-12.jpg', '2021-04-05 13:49:07');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `button_name` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `texts`
--

INSERT INTO `texts` (`id`, `text`, `title`, `button_name`, `button_link`) VALUES
(1, 'Machen Sie sich keine Sorgen mehr, wenn Sie in den Urlaub fahren möchten, weil Ihre Katze in sicheren Händen ist. Hier können Sie sehr schnel einen guten Katzensitter in Ihrer Nähe finden!', 'Katerbetreung vor Ort', 'suchen', 'catsitters'),
(2, 'Sind Sie ein Katzenliebhaber und verbringen Sie gerne viel Zeit mit den Tieren?\r\nDann können Sie einfach mit einem klick einen Katzensitter werden.', 'Werden Sie einen Katzensitter', 'werde katzensitter', 'users/register');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texts_sec`
--

CREATE TABLE `texts_sec` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `texts_sec`
--

INSERT INTO `texts_sec` (`id`, `title`, `text`, `link`) VALUES
(1, 'Katzenblog', 'Tipps für Katzzenhalter, Erfahrungen und Testberichte von den aktuellen Trends.', '/posts');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` int(11) NOT NULL,
  `district` varchar(255) NOT NULL,
  `is_catsitter` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`, `district`, `is_catsitter`, `avatar`) VALUES
(3, 'denny', 'deny@gmx.de', '$2y$10$f7Gm4tqWxjp5tUYQi4PXG.gb2gGBYu22eoipHCfhohYHMurqxiHvi', '2021-03-19 19:05:55', 0, 'Hamburg-Mitte', 1, 'unspl2.jpg'),
(4, 'alla', 'greylz@gmx.de', '$2y$10$8iS5AelzYdAeIh4RFJXfDu6oVpfCTMAtDjFOLRK6gC0MB3Vfv/AYG', '2021-03-19 21:04:02', 1, 'Harburg', 0, 'avatar.png'),
(5, 'Alex', 'admin@example.com', '$2y$10$tKZ01wGKDBREmKier/NKVO51W3Sn0NpaLyAaBEkuPMltWB.0laa9q', '2021-03-20 18:19:19', 1, 'Altona', 0, 'avatar.png'),
(7, 'sonia', 'sonia@gmx.de', '$2y$10$SG8MJwTDSJy9ftItjz.AEeYDYr0jWfSKFX03HEulNEhzSg45DpxIi', '2021-03-23 14:36:41', 0, 'Bergedorf', 1, 'unsplash7.jpg'),
(9, 'rosa', 'newuser_!@gmx.de', '$2y$10$mITEk3vWVeFFCTo7iFyXKOeMNvDBgc0biJT8j5Oxr3QZh59K5Qolu', '2021-03-23 22:15:53', 0, 'Hamburg-Mitte', 1, 'unsplash3.jpg'),
(10, 'lee', 'nona@gmx.de', '$2y$10$odterKJ.YYRbXkEhlrBCfOCSblMbpOr7aHWgKkilvewHVVK7x5tfe', '2021-03-23 22:17:17', 0, 'Bergedorf', 1, 'unsplash8.jpg'),
(11, 'alla', 'ala@gmail.de', '$2y$10$zPolXrgpO8qipqzzL03EU.YtoDsSrKLuZSXXWz2koVuObBkzBxSna', '2021-03-30 17:09:40', 0, 'Harburg', 1, 'unsplash1.jpg'),
(12, 'Bella D.', 'bella@gmx.de', '336699', '2021-04-05 15:38:11', 0, 'Hamburg-Mitte', 1, 'unsplash5.jpg'),
(13, 'Anna J.', 'anna@gmx.de', '336699', '2021-04-05 15:38:11', 0, 'Hamburg-Nord', 1, 'unsplash4.jpg'),
(14, 'Selena F.', 'selena@gmal.com', '336699', '2021-04-05 15:40:21', 0, 'Altona', 0, 'avatar.png'),
(15, 'Ferro L.', 'ferro@gmx.de', '336699', '2021-04-05 15:40:21', 0, 'Eimsbüttel', 1, 'unsplash6.jpg'),
(16, 'Dora', 'dora@gmx.de', '$2y$10$YHEEuGtO9Z0TLJdEPNR9rOvknTowbGD4Mt64tHUqoUU9c2w3/GHPa', '2021-04-07 20:34:30', 0, 'Altona', 0, 'avatar.png'),
(17, 'Flora', 'flora@gmx.de', '$2y$10$FLpGW928UHeoP136oQSmMeyUvHYxHlA63P1dxvUFBDmyE7EN2Je2W', '2021-04-07 21:16:25', 0, 'Altona', 1, 'avatar.png'),
(18, 'Billy', 'billy-willy@gmail.com', '$2y$10$z5xlDBYpVNxgPvGNzrr4j.LA9uktOtjPASM48dSb5jTM1TTIj8x6e', '2021-04-07 21:21:43', 0, 'Hamburg-Mitte', 2, 'avatar.png');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `texts_sec`
--
ALTER TABLE `texts_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `navs`
--
ALTER TABLE `navs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT für Tabelle `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `texts_sec`
--
ALTER TABLE `texts_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
