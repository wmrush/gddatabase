<!DOCTYPE html>
<html>
<head>
    <title>Пример использования класса GDLDatabase - класс для управления базой данных. MySQLi::stmt - подготовленные выражения</title>
</head>
<body>
<h1>GDLDatabase</h1>

<h3>Класс для управления базой данных. MySQLi::stmt - подготовленные выражения</h3>

<fieldset>
    <legend><h2>Дамп тестовой таблицы</h2></legend>
<pre>
CREATE DATABASE IF NOT EXISTS `dbase`;
USE `dbase`;

CREATE TABLE IF NOT EXISTS `table` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) DEFAULT '0',
    `date` date DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `table` (`id`, `name`, `date`) VALUES
    (1, 'Иван', '2012-11-04'),
    (2, 'Степан', '2012-11-06'),
    (3, 'Пётр', '2012-11-07');
</pre>
</fieldset>
    <?php
// Подключаем класс для управления базой данных и концигурацию
require_once('dbconfig.php');

try {
    $result = GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, 'Степан'));
    echo '<fieldset><legend><h2>select()</h2></legend>Вывод всех значений';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, \'Степан\'));';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    $result = GDLDatabase::Init()->selectRow("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, 'Степан'));
    echo '<fieldset><legend><h2>selectRow()</h2></legend>Вывод первой строки';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->selectRow("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->selectRow("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, \'Степан\'));';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    $result = GDLDatabase::Init()->selectCol("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, 'Степан'));
    echo '<fieldset><legend><h2>selectCol()</h2></legend>Вывод первого столбца запроса';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->selectCol("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->selectCol("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, \'Степан\'));';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    $result = GDLDatabase::Init()->selectCell("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, 'Степан'));
    echo '<fieldset><legend><h2>selectCell()</h2></legend>Вывод первой ячейки первого столбца запроса';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->selectCell("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->selectCell("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, \'Степан\'));';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    $result = GDLDatabase::Init()->update("UPDATE `#__table` SET `date`=? WHERE  `id`=? AND `name`=?", array('2012-11-07', 3, 'Пётр'));
    echo '<fieldset><legend><h2>update()</h2></legend>Обновление записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->update("UPDATE `#__table` SET `date`=? WHERE  `id`=? AND `name`=?", array(\'2012-11-07\', 3, \'Пётр\'));<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->update("UPDATE `#__table` SET `date`=? WHERE  `id`=? AND `name`=?", \'2012-11-07\', 3, \'Пётр\');';
    echo '</fieldset>';

    $result = GDLDatabase::Init()->insert("INSERT INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));
    echo '<fieldset><legend><h2>insert()</h2></legend>Вставка записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->insert("INSERT INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", array(4, \'Антон\', \'2012-11-07\'));<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->insert("INSERT INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", 4, \'Антон\', \'2012-11-07\');';
    echo '</fieldset>';

    $result = GDLDatabase::Init()->replace("REPLAСE INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));
    echo '<fieldset><legend><h2>replace()</h2></legend>Перезапись записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->replace("REPLAСE INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", array(4, \'Антон\', \'2012-11-07\'));<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->replace("REPLAСE INTO `#__table` (`id`, `name`, `date`) VALUES (?, ?, ?);", 4, \'Антон\', \'2012-11-07\');';
    echo '</fieldset>';

    $result = GDLDatabase::Init()->delete("DELETE FROM `#__table` WHERE  `id`=? AND `name`=?", array(4, 'Антон'));
    echo '<fieldset><legend><h2>delete()</h2></legend>Удаление записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->delete("DELETE FROM `#__table` WHERE  `id`=? AND `name`=?", array(4, \'Антон\'));<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->delete("DELETE FROM `#__table` WHERE  `id`=? AND `name`=?", 4, \'Антон\');';
    echo '</fieldset>';

    $result = GDLDatabase::Init()->getCacheSql('selectRow', "SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, 'Степан'));
    echo '<fieldset><legend><h2>getCacheSql()</h2></legend>Вывод всех значений (метод <b>selectRow</b>) при использовании кэширования';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->getCacheSql("selectRow", "SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo 'или<br />';
    echo '$result = GDLDatabase::Init()->getCacheSql("selectRow", "SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", array(1, \'Степан\'));';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    echo '<fieldset><legend><h2>Транзакция</h2></legend>';
    echo '<h3>Использование транзакции:</h3>';
    echo '$db=GDLDatabase::Init();
          <br>$db->transactionStart();
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',20);
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',10);
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',123);
          <br>$db->transactionCommit();';

    echo '<h3>Откат текущей транзакции:</h3>';
    echo '$db=GDLDatabase::Init();
          <br>$db->transactionStart();
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',20);
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',10);
          <br>$db->insert(\'INSERT INTO `#__table` set testval =?\',123);
          <br>$db->transactionRollBack();
          <br>$db->transactionCommit();';
    echo '</fieldset>';

    $result = GDLDatabase::Init()->simpleQuery("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=1 OR `name`= 'Степан'");
    echo '<fieldset><legend><h2>simpleQuery()</h2></legend>Простое выполнение запроса';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->simpleQuery("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`=? OR `name`=?", 1, \'Степан\');<br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    GDLDatabase::Init()->insert("INSERT INTO `#__table` (`name`, `date`) VALUES (?, ?);", array('Елена', '2012-10-07'));
    $result1 = GDLDatabase::Init()->getQueryInfo();
    GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`>?", 6);
    $result2 = GDLDatabase::Init()->getQueryInfo();
    echo '<fieldset><legend><h2>getQueryInfo()</h2></legend>Получение дополнительной информации о последнем запросе';
    echo '<h3>Пример:</h3>';
    echo 'GDLDatabase::Init()->insert("INSERT INTO `#__table` (`name`, `date`) VALUES (?, ?);", array(\'Елена\', \'2012-10-07\'));<br>';
    echo '$result1 = GDLDatabase::Init()->getQueryInfo();<br /><br />';
    echo 'GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id`>?, 6);<br>';
    echo '$result2 = GDLDatabase::Init()->getQueryInfo();<br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result1);
    print_r($result2);
    echo '</pre></fieldset>';

    GDLDatabase::Init()->select("SELECT `id`, `names`, `date` FROM `#__table` WHERE `id`>?", 6);
    $result = GDLDatabase::Init()->getError();
    echo '<fieldset><legend><h2>getError()</h2></legend>Описание ошибки последнего запроса';
    echo '<h3>Пример:</h3>';
    echo 'GDLDatabase::Init()->select("SELECT `id`, `names`, `date` FROM `#__table` WHERE `id`>?", 6);<br>';
    echo '$result = GDLDatabase::Init()->getError();<br /><br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    GDLDatabase::Init()->select("SELECT `id`, `names`, `date` FROM `#__table` WHERE `id`>?", 6);
    $result = GDLDatabase::Init()->getErrno();
    echo '<fieldset><legend><h2>getErrno()</h2></legend>Описание номера ошибки последнего запроса';
    echo '<h3>Пример:</h3>';
    echo 'GDLDatabase::Init()->select("SELECT `id`, `names`, `date` FROM `#__table` WHERE `id`>?", 6);<br>';
    echo '$result = GDLDatabase::Init()->getErrno();<br /><br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id` >= ?", 3);
    GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id` < ?", 3);
    $result = GDLDatabase::Init()->showProfiles();
    echo '<fieldset><legend><h2>showProfiles()</h2></legend>Показать профилирование запросов';
    echo '<h3>Пример:</h3>';
    echo 'GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id` >= ?", 3);<br>';
    echo 'GDLDatabase::Init()->select("SELECT `id`, `name`, `date` FROM `#__table` WHERE `id` < ?", 3);<br>';
    echo '$result = GDLDatabase::Init()->showProfiles();<br /><br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

    $result = GDLDatabase::Init()->getObject();
    echo '<fieldset><legend><h2>getObject()</h2></legend>Возвращает обьект класса mysqli для нереализованных операций';
    echo '<h3>Пример:</h3>';
    echo '$result = GDLDatabase::Init()->getObject();<br>';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></fieldset>';

} catch (Exception $e) {
    echo '<i>Ошибка:</i> ' . $e->getMessage() . '<br>';
    echo '<i>Файл:</i> ' . $e->getFile() . '<br>';
    echo '<i>Строка:</i> ' . $e->getLine();
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}




