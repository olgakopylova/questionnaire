SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `questionnaire`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dictionary`
--

CREATE TABLE `dictionary` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'GUID',
  `user_family` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фамилия',
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `user_patronymic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Отчество',
  `user_sex` int(11) NOT NULL COMMENT '0 - женский, 1 - мужской',
  `user_age` int(11) NOT NULL COMMENT 'Возраст',
  `user_living_town` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Город',
  `user_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Вопрос'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'GUID', AUTO_INCREMENT=13;
COMMIT;