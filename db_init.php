<?php
require_once "class/DB.php";

$db = new DB();

try{
    $db->query("START TRANSACTION;");

    $db->query("CREATE DATABASE questionnaire;");

    $db->query("CREATE TABLE `dictionary` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");


    $db->query("CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'GUID',
  `user_family` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фамилия',
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `user_patronymic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Отчество',
  `user_sex` int(11) NOT NULL COMMENT '0 - женский, 1 - мужской',
  `user_age` int(11) NOT NULL COMMENT 'Возраст',
  `user_living_town` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Город',
  `user_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Вопрос'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

    $db->query("ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`);");
    $db->query("ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);");

    $db->query("ALTER TABLE `dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'GUID', AUTO_INCREMENT=13;
COMMIT;");

    $db->query("INSERT INTO `dictionary` (`id_type`, `value`) VALUES
( 1, 'Пенза'),
(1, 'Саратов'),
(1, 'Москва'),
(1, 'Пермь');");
    $db->query("COMMIT;");
}catch (Exception $exception){
    $db->query("ROLLBACK;");
    echo "error";
}
