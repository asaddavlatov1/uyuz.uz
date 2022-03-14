-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2022 г., 13:17
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `uyuz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comforts`
--

CREATE TABLE `comforts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_type` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comforts`
--

INSERT INTO `comforts` (`id`, `name`, `flat_type`, `created_at`, `updated_at`) VALUES
(1, 'Balkon', 1, '2022-03-13 05:44:27', '2022-03-13 05:44:27'),
(2, 'Oshxona', 1, '2022-03-13 05:48:32', '2022-03-13 05:48:32');

-- --------------------------------------------------------

--
-- Структура таблицы `comfort_tables`
--

CREATE TABLE `comfort_tables` (
  `id` bigint UNSIGNED NOT NULL,
  `comfort_id` bigint UNSIGNED NOT NULL,
  `flat_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comfort_tables`
--

INSERT INTO `comfort_tables` (`id`, `comfort_id`, `flat_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2022-03-13 05:51:40', '2022-03-13 05:51:40'),
(2, 1, 2, 0, '2022-03-13 11:44:41', '2022-03-13 11:44:41'),
(3, 2, 2, 0, '2022-03-13 11:44:41', '2022-03-13 11:44:41'),
(4, 1, 3, 0, '2022-03-13 11:48:40', '2022-03-13 11:48:40'),
(5, 1, 4, 0, '2022-03-13 11:52:34', '2022-03-13 11:52:34'),
(6, 1, 5, 0, '2022-03-13 12:08:59', '2022-03-13 12:08:59');

-- --------------------------------------------------------

--
-- Структура таблицы `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `districts`
--

INSERT INTO `districts` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Chilonzor', 1, '2022-03-13 05:38:44', '2022-03-13 05:38:44');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `flats`
--

CREATE TABLE `flats` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_type` bigint UNSIGNED NOT NULL,
  `user` bigint UNSIGNED NOT NULL,
  `payment_type` bigint UNSIGNED NOT NULL,
  `region` bigint UNSIGNED NOT NULL,
  `district` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_storey` int NOT NULL,
  `square` int NOT NULL,
  `storey` int NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_room` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `flats`
--

INSERT INTO `flats` (`id`, `name`, `flat_type`, `user`, `payment_type`, `region`, `district`, `comment`, `f_storey`, `square`, `storey`, `phone`, `num_room`, `price`, `created_at`, `updated_at`, `status`, `url`) VALUES
(1, 'Ikki xonali uy sotiladi', 1, 2, 1, 1, 1, 'rewfrwef', 5, 55, 3, '998989595', 2, 55555, '2022-03-13 05:51:40', '2022-03-13 05:51:40', 1, ''),
(2, 'Balkon', 1, 2, 1, 1, 1, 'sdcdscds', 5, 55, 3, '998989595', 2, 55555, '2022-03-13 11:44:41', '2022-03-13 11:44:41', 1, 'C:\\OpenServer\\userdata\\temp\\upload\\php6B9D.tmp'),
(3, 'Dollor', 1, 2, 1, 1, 1, 'fghdfghg', 5, 55, 3, '998989595', 2, 55555, '2022-03-13 11:48:40', '2022-03-13 11:48:40', 1, 'C:\\OpenServer\\userdata\\temp\\upload\\php1398.tmp'),
(4, 'Ikki xonali uy sotiladi', 1, 2, 1, 1, 1, 'fghdg', 5, 55, 3, '998989595', 2, 55555, '2022-03-13 11:52:34', '2022-03-13 11:52:34', 1, 'images/RwIm9iPN55Vn4PrwfswTyNa9cAOLK1M9cMYK36oB.jpg'),
(5, 'asdasdasdasd', 1, 2, 1, 1, 1, 'asdasdasd', 5, 55, 3, '998989595', 2, 55555, '2022-03-13 12:08:59', '2022-03-13 12:08:59', 1, 'images/nQxDVmhVbIssin6ixGwzsRDHVsqCSdJHQA4Hd40n.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `flat_types`
--

CREATE TABLE `flat_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `flat_types`
--

INSERT INTO `flat_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kvartira', '2022-03-13 05:41:48', '2022-03-13 05:41:48'),
(2, 'Sanatoriya', '2022-03-13 05:41:53', '2022-03-13 05:41:53'),
(3, 'Mehmonxona', '2022-03-13 05:41:58', '2022-03-13 05:41:58'),
(4, 'Restaurant', '2022-03-13 05:42:02', '2022-03-13 05:42:02'),
(5, 'Gazon', '2022-03-13 05:42:07', '2022-03-13 05:42:07'),
(6, 'Dacha', '2022-03-13 05:42:12', '2022-03-13 05:42:12');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `flat` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `flat`, `url`, `number`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/EmsbNyBmvEabpa2FRjQyNyVlJlRJYmzh04Cueefb.jpg', 1, '2022-03-13 05:51:41', '2022-03-13 05:51:41'),
(2, 3, 'images/1m51w2QhOHEyO2j1tnLHdu4eDBpMqI10iB97huR2.jpg', 1, '2022-03-13 11:48:40', '2022-03-13 11:48:40'),
(3, 4, 'images/mjNX67EgPVgiIfE4h0NV1idJVGgJT2tNaZV3QE5e.jpg', 1, '2022-03-13 11:52:34', '2022-03-13 11:52:34'),
(4, 5, 'images/CnQaxBmydf3sQcgQ1GlpFXDtCnudw5oqHhxOrdtu.png', 1, '2022-03-13 12:08:59', '2022-03-13 12:08:59');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_07_193615_create_flat_types_table', 1),
(6, '2022_02_08_103820_create_regions_table', 1),
(7, '2022_02_08_110330_create_districts_table', 1),
(8, '2022_02_08_111725_create_payment_types_table', 1),
(9, '2022_02_08_111752_create_flats_table', 1),
(10, '2022_02_08_111809_create_comforts_table', 1),
(11, '2022_02_08_111837_create_comfort_tables_table', 1),
(12, '2022_02_08_112024_create_nearbies_table', 1),
(13, '2022_02_08_112101_create_nearby_tables_table', 1),
(14, '2022_02_08_112208_create_images_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `nearbies`
--

CREATE TABLE `nearbies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_type` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `nearbies`
--

INSERT INTO `nearbies` (`id`, `name`, `flat_type`, `created_at`, `updated_at`) VALUES
(1, 'Stadion', 1, '2022-03-13 05:50:30', '2022-03-13 05:50:30');

-- --------------------------------------------------------

--
-- Структура таблицы `nearby_tables`
--

CREATE TABLE `nearby_tables` (
  `id` bigint UNSIGNED NOT NULL,
  `nearby` bigint UNSIGNED NOT NULL,
  `flat` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `nearby_tables`
--

INSERT INTO `nearby_tables` (`id`, `nearby`, `flat`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2022-03-13 05:51:40', '2022-03-13 05:51:40'),
(2, 1, 2, 0, '2022-03-13 11:44:41', '2022-03-13 11:44:41'),
(3, 1, 3, 0, '2022-03-13 11:48:40', '2022-03-13 11:48:40'),
(4, 1, 4, 0, '2022-03-13 11:52:34', '2022-03-13 11:52:34'),
(5, 1, 5, 0, '2022-03-13 12:08:59', '2022-03-13 12:08:59');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `sum`, `created_at`, `updated_at`) VALUES
(1, 'Dollor', '11000', '2022-03-13 05:39:26', '2022-03-13 05:39:26');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toshkent shahar', '2022-03-13 05:38:33', '2022-03-13 05:38:33');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `email`, `phone`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Asadbek', 'Davlatov', 'davlatov', 'asaddavlatov1@gmail.com', '998989595', 1, '$2y$10$Mr6q8AYn.hitDptz8/wYu.W9p7Q60sFG96DRA.wfDGqK6hGjpjafi', NULL, '2022-03-13 05:35:35', '2022-03-13 05:35:35'),
(2, 'Asadbek', 'Davlatov', 'asadbek', 'wedwd@gmail.com', '99898959598465', 2, '$2y$10$lZ4Cw6mkrI/01EJAR4gVEuLW.AQMRHwCKEhrLsZLAAq7B6KlqdGPe', NULL, '2022-03-13 05:50:58', '2022-03-13 05:50:58');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comforts`
--
ALTER TABLE `comforts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comforts_flat_type_foreign` (`flat_type`);

--
-- Индексы таблицы `comfort_tables`
--
ALTER TABLE `comfort_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comfort_tables_flat_id_foreign` (`flat_id`),
  ADD KEY `comfort_tables_comfort_id_foreign` (`comfort_id`);

--
-- Индексы таблицы `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_region_id_foreign` (`region_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flats_flat_type_foreign` (`flat_type`),
  ADD KEY `flats_region_foreign` (`region`),
  ADD KEY `flats_district_foreign` (`district`),
  ADD KEY `flats_payment_type_foreign` (`payment_type`),
  ADD KEY `flats_user_foreign` (`user`);

--
-- Индексы таблицы `flat_types`
--
ALTER TABLE `flat_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_flat_foreign` (`flat`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nearbies`
--
ALTER TABLE `nearbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nearbies_flat_type_foreign` (`flat_type`);

--
-- Индексы таблицы `nearby_tables`
--
ALTER TABLE `nearby_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nearby_tables_flat_foreign` (`flat`),
  ADD KEY `nearby_tables_nearby_foreign` (`nearby`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comforts`
--
ALTER TABLE `comforts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comfort_tables`
--
ALTER TABLE `comfort_tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `flats`
--
ALTER TABLE `flats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `flat_types`
--
ALTER TABLE `flat_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `nearbies`
--
ALTER TABLE `nearbies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `nearby_tables`
--
ALTER TABLE `nearby_tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comforts`
--
ALTER TABLE `comforts`
  ADD CONSTRAINT `comforts_flat_type_foreign` FOREIGN KEY (`flat_type`) REFERENCES `flat_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comfort_tables`
--
ALTER TABLE `comfort_tables`
  ADD CONSTRAINT `comfort_tables_comfort_id_foreign` FOREIGN KEY (`comfort_id`) REFERENCES `comforts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comfort_tables_flat_id_foreign` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_district_foreign` FOREIGN KEY (`district`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flats_flat_type_foreign` FOREIGN KEY (`flat_type`) REFERENCES `flat_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flats_payment_type_foreign` FOREIGN KEY (`payment_type`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flats_region_foreign` FOREIGN KEY (`region`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flats_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_flat_foreign` FOREIGN KEY (`flat`) REFERENCES `flats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `nearbies`
--
ALTER TABLE `nearbies`
  ADD CONSTRAINT `nearbies_flat_type_foreign` FOREIGN KEY (`flat_type`) REFERENCES `flat_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `nearby_tables`
--
ALTER TABLE `nearby_tables`
  ADD CONSTRAINT `nearby_tables_flat_foreign` FOREIGN KEY (`flat`) REFERENCES `flats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nearby_tables_nearby_foreign` FOREIGN KEY (`nearby`) REFERENCES `nearbies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
