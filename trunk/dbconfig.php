<?php
// Путь до файла конфигурации
define('_PATH_DBCONFIG_FILE', 'dbconfig.ini');

// Языковые константы
define('_EXC_MYSQLI_MODULE_NOT', 'Модуль MySQLi не подключен.');
define('_EXC_ERROR_CONNECT_DB', 'Ошибка подключения к базе данных.');
define('_EXC_UNDEFINED_PROPERTY_CLASS', 'Попыка вызвать несуществующее свойство &laquo;<b>%s</b>&raquo; объекта &laquo;<b>%s</b>&raquo;.');
define('_EXC_SQL_ISNOT_DATA', 'Количество маркеров в SQL-строке не совпадает с количеством данных.<br>Количество маркеров: <b>%d</b>.<br>Количество данных: <b>%d</b>.');
define('_EXC_ISNOT_FILECONFIG', 'Файл конфигурации базы данных не найден.');

require_once('database.php');

