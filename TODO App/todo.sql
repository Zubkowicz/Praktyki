-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Maj 2022, 08:31
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `todo` text COLLATE utf8_polish_ci NOT NULL,
  `details` text COLLATE utf8_polish_ci NOT NULL,
  `created_by` text COLLATE utf8_polish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `todos`
--

INSERT INTO `todos` (`id`, `todo`, `details`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'fff                                                 ', '000fsdghj                              ', '2', '2022-05-02 13:30:47', '2022-05-05 11:52:04'),
(10, 'as', 'as', '2', '2022-05-02 14:07:50', '2022-05-02 14:07:50'),
(23, 'zxcv', 'zxvc', '5', '2022-05-05 10:47:22', '2022-05-05 10:47:22'),
(25, 'teat', 'test1234', '1', '2022-05-05 11:08:36', '2022-05-05 13:55:45'),
(26, 'wer', 'werrtwrewrwetw dfgewxefwergxrwgergwergbwcesef', '2', '2022-05-05 11:42:51', '2022-05-05 11:42:51'),
(27, 'Ipsum', '[32] Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?\r\n[33] At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2', '2022-05-05 11:43:31', '2022-05-05 11:52:44'),
(29, 'asas', 'asasasa', '1', '2022-05-05 12:04:39', '2022-05-05 12:04:39'),
(31, 'ffhsgjdhkfjyl', 'asdhsjdgkflgh', '1', '2022-05-05 14:53:28', '2022-05-05 14:53:28'),
(32, 'safasgdgadfgacregeqrvhyrtjetyjtybjruytkjtyunkntyumkuiylyuimoynitrsyretvewtvewtcwe', 'aaaa', '1', '2022-05-05 15:29:01', '2022-05-06 08:30:21'),
(33, 'yeah', 'yeah', '1', '2022-05-06 08:30:35', '2022-05-06 08:30:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'gaba', '$2y$10$gYrgmTbFWLaUlQomo1OjgeHreEZurJnrpHJ/yVrfvPgtSMwHGpp9q'),
(2, 'adam', '$2y$10$dRNt2ZC//Bvt6wU/IY8YnuGVa5MHqO.oiNyw9rNIMXWaW6o9VRQcO'),
(4, 'tomek123', '$2y$10$PLCkwrJUcqkyxbaki3W46Od5zjRv223tXDRzUpggJ4QGdcgePNeX.'),
(5, 'krowa', '$2y$10$LZXcotTcfh6vgEZysWKINuX/MwiuUVJXjQhUzaVo6sez2vaPxHGEe');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
