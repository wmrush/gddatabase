<?php
/**
 * GDDatabase - Класс для управления базой данных
 *
 * @package     GDDatabase
 * @version     1.4
 * @author      Gold Dragon <illusive@bk.ru>
 * @link        http://lotos-cms.ru
 * @copyright   2000-2014 Gold Dragon
 * @license     MIT License: /MIT_License.lic
 * @date        16.12.2014
 * @see         https://code.google.com/p/gddatabase/
 * @see         https://code.google.com/p/gddatabase/w/list
 *
 * @description Класс для управления базой данных. MySQLi::stmt - подготовленные выражения
 */

// Абсолютный путь до файла конфигурации
define('_GDDB_PATH_CONFIG_FILE', 'D:/Server/domains/gddatabase.qqq/gddbconfig.ini');

// Языковые константы
define('_EXCEP_MYSQLI_MODULE_NOT', 'Модуль MySQLi не подключен.');
define('_EXCEP_ERROR_CONNECT_DB', 'Ошибка подключения к базе данных.');
define('_EXCEP_ERROR_LOADING_CHARACTER_SET', 'Ошибка при загрузке набора символов: %s.');
define('_EXCEP_UNDEFINED_PROPERTY_CLASS', 'Попыка вызвать несуществующее свойство &laquo;<b>%s</b>&raquo; объекта &laquo;<b>%s</b>&raquo;.');
define('_EXCEP_SQL_ISNOT_DATA', 'Количество маркеров в SQL-строке не совпадает с количеством данных.<br>Количество маркеров: <b>%d</b>.<br>Количество данных: <b>%d</b>.');
define('_EXCEP_ISNOT_FILECONFIG', 'Файл конфигурации базы данных не найден.');

