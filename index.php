<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Пример использования класса GDDatabase - класс для управления базой данных. MySQLi::stmt - подготовленные выражения</title>
    <style>
        body {
            margin: 10px 50px;
        }

        h2 {
            margin: 5px;
            padding: 5px;
            font-size: 16pt;
            color: #900;
        }
        .h2{
            font-weight: normal;
            font-size: 80%;
        }

        div {
            background-color: #fff;
            border: 1px #ccc solid;
            padding: 10px 20px;
            margin: 10px 0;
        }

        h3 {
            color: #666;
            font-size: 12pt;
        }
    </style>
    <link rel="stylesheet" href="http://yandex.st/highlightjs/7.3/styles/default.min.css">
    <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
</head>
<body>

<h1>GDDataBase</h1>

<h3>Класс для управления базой данных. MySQLi::stmt - подготовленные выражения</h3>

<p>В этом файле приведены примеры работы с классом. Дополнительную информацию вы сможете получить на <a href="https://code.google.com/p/gddatabase/w/list">WIKI</a></p>

<p>Задать вопросы вы можете на официальном форуме поддержки на сайте <a href="http://joostina-cms.ru/">Joostina-CMS.ru</a></p>

<!--------------------------------------------------------------------------------------->

<div>
    <h2>Дамп тестовой таблицы</h2>
<pre>
    <code class="sql">
CREATE DATABASE IF NOT EXISTS gddatabase;
USE gddatabase;

CREATE TABLE IF NOT EXISTS gd_table (
    id int(10) NOT NULL AUTO_INCREMENT,
    name_t varchar(50) DEFAULT '0',
    date_t date DEFAULT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO gd_table (id, name_t, date_t) VALUES
    (1, 'Иван', '2012-11-04'),
    (2, 'Степан', '2012-11-06'),
    (3, 'Пётр', '2012-11-07');
    </code>
</pre>
</div>

<!--------------------------------------------------------------------------------------->

<?php require_once('gddbdefine.php'); ?>
<?php require_once('gddatabase.php'); ?>

<div>
    <h2>Подключение</h2>
    <h3>Подключаем файл с константами</h3>
    <pre><code class="php">require_once('gddbdefine.php');</code></pre>
    <h3>Подключаем сам класс</h3>
    <pre><code class="php">require_once('gddatabase.php');</code></pre>
</div>

<?php try { ?>

    <!--------------------------------------------------------------------------------------->

    <?php $result = GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>

    <div>
        <h2>select() - <span class="h2">Вывод всех значений</span></h2>

        <h3>Пример:</h3>
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->select($sql, 1, 'Степан');
        </code></pre>
или
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->select($sql, array(1, 'Степан'));
        </code></pre>

        <h3>Результат:</h3>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <?php $result = GDDatabase::Init()->selectRow("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>

    <div>
        <h2>selectRow() - <span class="h2">Вывод первой строки</span></h2>

        <h3>Пример:</h3>
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectRow($sql, 1, 'Степан');
        </code></pre>
        или
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectRow($sql, array(1, 'Степан'));
        </code></pre>
        <h3>Результат:</h3>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <?php $result = GDDatabase::Init()->selectCol("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
    <div>
        <h2>selectCol() - <span class="h2">Вывод первого столбца запроса</span></h2>

        <h3>Пример:</h3>
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCol($sql, 1, 'Степан');
            </code></pre>
        или
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCol($sql, array(1, 'Степан'));';
            </code></pre>
        <h3>Результат:</h3>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>


    <!--------------------------------------------------------------------------------------->

    <?php $result = GDDatabase::Init()->selectCell("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
    <div>
        <h2>selectCell() - <span class="h2">Вывод первой ячейки первого столбца запроса</span></h2>

        <h3>Пример:</h3><pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCell($sql, 1, 'Степан');
            </code></pre>
        или
        <pre><code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCell($sql, array(1, 'Степан'));
            </code></pre>
        <h3>Результат:</h3>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <?php $result = GDDatabase::Init()->update("UPDATE #__table SET date_t=? WHERE  id=? AND name_t=?", array('2012-11-07', 3, 'Пётр')); ?>
    <div>
        <h2>update() - <span class="h2">Обновление записи</span></h2>

        <h3>Пример:</h3>
<pre><code class="php">
$sql = "UPDATE #__table SET date_t=? WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->update($sql, array('2012-11-07', 3, 'Пётр'));
    </code></pre>
        или
<pre><code class="php">
$sql = "UPDATE #__table SET date_t=? WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->update($sql, '2012-11-07', 3, 'Пётр');
    </code></pre>
    </div>



    <?php
    /*
    <!--------------------------------------------------------------------------------------->

    $result = GDDatabase::Init()->insert("INSERT INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));
    echo '<div><h2>insert()</h2>Вставка записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->insert("INSERT INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));<br />';
    echo 'или<br />';
    echo '$result = GDDatabase::Init()->insert("INSERT INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", 4, 'Антон', '2012-11-07');';
    echo '</div>';

    <!--------------------------------------------------------------------------------------->

    $result = GDDatabase::Init()->replace("REPLAСE INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));
    echo '<div><h2>replace()</h2>Перезапись записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->replace("REPLAСE INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", array(4, 'Антон', '2012-11-07'));<br />';
    echo 'или<br />';
    echo '$result = GDDatabase::Init()->replace("REPLAСE INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);", 4, 'Антон', '2012-11-07');';
    echo '</div>';

     <!--------------------------------------------------------------------------------------->

   $result = GDDatabase::Init()->delete("DELETE FROM #__table WHERE  id=? AND name_t=?", array(4, 'Антон'));
    echo '<div><h2>delete()</h2>Удаление записи';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->delete("DELETE FROM #__table WHERE  id=? AND name_t=?", array(4, 'Антон'));<br />';
    echo 'или<br />';
    echo '$result = GDDatabase::Init()->delete("DELETE FROM #__table WHERE  id=? AND name_t=?", 4, 'Антон');';
    echo '</div>';

    <!--------------------------------------------------------------------------------------->

    $result = GDDatabase::Init()->getCacheSql('selectRow', "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан'));
    echo '<div><h2>getCacheSql()</h2>Вывод всех значений (метод <b>selectRow</b>) при использовании кэширования';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->getCacheSql("selectRow", "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", 1, 'Степан');<br />';
    echo 'или<br />';
    echo '$result = GDDatabase::Init()->getCacheSql("selectRow", "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан'));';
    echo '<h3>Результат:</h3>';
    <pre><code><?php print_r($result); ?></code></pre>

    echo '<div><h2>Транзакция</h2>';
    echo '<h3>Использование транзакции:</h3>';
    echo '$db=GDDatabase::Init();
          <br>$db->transactionStart();
          <br>$db->insert('INSERT INTO #__table set testval =?',20);
          <br>$db->insert('INSERT INTO #__table set testval =?',10);
          <br>$db->insert('INSERT INTO #__table set testval =?',123);
          <br>$db->transactionCommit();';

    echo '<h3>Откат текущей транзакции:</h3>';
    echo '$db=GDDatabase::Init();
          <br>$db->transactionStart();
          <br>$db->insert('INSERT INTO #__table set testval =?',20);
          <br>$db->insert('INSERT INTO #__table set testval =?',10);
          <br>$db->insert('INSERT INTO #__table set testval =?',123);
          <br>$db->transactionRollBack();
          <br>$db->transactionCommit();';
    echo '</div>';

    <!--------------------------------------------------------------------------------------->

    $result = GDDatabase::Init()->simpleQuery("SELECT id, name_t, date_t FROM #__table WHERE id=1 OR name_t= 'Степан'");
    echo '<div><h2>simpleQuery()</h2>Простое выполнение запроса';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->simpleQuery("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", 1, 'Степан');<br />';
    echo '<h3>Результат:</h3>';
    <pre><code><?php print_r($result); ?></code></pre>

    <!--------------------------------------------------------------------------------------->

    GDDatabase::Init()->insert("INSERT INTO #__table (name_t, date_t) VALUES (?, ?);", array('Елена', '2012-10-07'));
    $result1 = GDDatabase::Init()->getQueryInfo();
    GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id>?", 6);
    $result2 = GDDatabase::Init()->getQueryInfo();
    echo '<div><h2>getQueryInfo()</h2>Получение дополнительной информации о последнем запросе';
    echo '<h3>Пример:</h3>';
    echo 'GDDatabase::Init()->insert("INSERT INTO #__table (name_t, date_t) VALUES (?, ?);", array('Елена', '2012-10-07'));<br>';
    echo '$result1 = GDDatabase::Init()->getQueryInfo();<br /><br />';
    echo 'GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id>?, 6);<br>';
    echo '$result2 = GDDatabase::Init()->getQueryInfo();<br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result1);
    print_r($result2);
    echo '</pre></div>';

    <!--------------------------------------------------------------------------------------->

    GDDatabase::Init()->select("SELECT id, NAMES, date_t FROM #__table WHERE id>?", 6);
    $result = GDDatabase::Init()->getError();
    echo '<div><h2>getError()</h2>Описание ошибки последнего запроса';
    echo '<h3>Пример:</h3>';
    echo 'GDDatabase::Init()->select("SELECT id, names, date_t FROM #__table WHERE id>?", 6);<br>';
    echo '$result = GDDatabase::Init()->getError();<br /><br />';
    echo '<h3>Результат:</h3>';
    <pre><code><?php print_r($result); ?></code></pre>
    </div>';

    <!--------------------------------------------------------------------------------------->

    GDDatabase::Init()->select("SELECT id, NAMES, date_t FROM #__table WHERE id>?", 6);
    $result = GDDatabase::Init()->getErrno();
    echo '<div><h2>getErrno()</h2>Описание номера ошибки последнего запроса';
    echo '<h3>Пример:</h3>';
    echo 'GDDatabase::Init()->select("SELECT id, names, date_t FROM #__table WHERE id>?", 6);<br>';
    echo '$result = GDDatabase::Init()->getErrno();<br /><br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></div>';

     <!--------------------------------------------------------------------------------------->

   GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id >= ?", 3);
    GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id < ?", 3);
    $result = GDDatabase::Init()->showProfiles();
    echo '<div><h2>showProfiles()</h2>Показать профилирование запросов';
    echo '<h3>Пример:</h3>';
    echo 'GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id >= ?", 3);<br>';
    echo 'GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id < ?", 3);<br>';
    echo '$result = GDDatabase::Init()->showProfiles();<br /><br />';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></div>';

    <!--------------------------------------------------------------------------------------->

    $result = GDDatabase::Init()->getObject();
    echo '<div><h2>getObject()</h2>Возвращает обьект класса mysqli для нереализованных операций';
    echo '<h3>Пример:</h3>';
    echo '$result = GDDatabase::Init()->getObject();<br>';
    echo '<h3>Результат:</h3>';
    echo '<pre>';
    print_r($result);
    echo '</pre></div>';
*/
} catch (Exception $e) {
    ?>
    <div style="color:#f00">
        <i>Ошибка:</i> <?php echo $e->getMessage(); ?><br>
        <i>Файл:</i> <?php echo $e->getFile(); ?> <br>
        <i>Строка:</i> <?php echo $e->getLine(); ?>
        <pre><?php echo $e->getTraceAsString(); ?> </pre>
    </div>
<?php
}

?>
<script type="text/javascript">
    hljs.initHighlightingOnLoad();
</script>
</body>
</html>


