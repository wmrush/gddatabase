<?php
/**
 * GDDatabase - Класс для управления базой данных
 *
 * @package     GDDatabase
 * @version     1.3
 * @author      Gold Dragon <illusive@bk.ru>
 * @link        http://gdlotos.ru
 * @copyright   2000-2013 Gold Dragon
 * @license     GNU GPL: http://www.gnu.org/licenses/gpl-3.0.html
 * @date        19.01.2013
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

