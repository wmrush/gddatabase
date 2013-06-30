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

        .h2 {
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

    <div>
        <h2>select() - <span class="h2">Вывод всех значений</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->select($sql, 1, 'Степан');
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->select($sql, array(1, 'Степан'));
            </code>
        </pre>

        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>selectRow() - <span class="h2">Вывод первой строки</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectRow($sql, 1, 'Степан');
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectRow($sql, array(1, 'Степан'));
            </code>
        </pre>
        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->selectRow("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>selectCol() - <span class="h2">Вывод первого столбца запроса</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCol($sql, 1, 'Степан');
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCol($sql, array(1, 'Степан'));
            </code>
        </pre>
        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->selectCol("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>


    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>selectCell() - <span class="h2">Вывод первой ячейки первого столбца запроса</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCell($sql, 1, 'Степан');
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->selectCell($sql, array(1, 'Степан'));
            </code>
        </pre>
        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->selectCell("SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>getCacheSql() - <span class="h2">Вывод всех значений (метод <b>selectRow</b>) при использовании кэширования</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->getCacheSql("selectRow", $sql , 1, 'Степан');
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?";
$result = GDDatabase::Init()->getCacheSql("selectRow", $sql, array(1, 'Степан'));
            </code>
        </pre>
        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->getCacheSql('selectRow', "SELECT id, name_t, date_t FROM #__table WHERE id=? OR name_t=?", array(1, 'Степан')); ?>
        <pre><code><?php print_r($result); ?></code></pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>update() - <span class="h2">Обновление записи</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "UPDATE #__table SET date_t=? WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->update($sql, array('2012-11-07', 3, 'Пётр'));
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "UPDATE #__table SET date_t=? WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->update($sql, '2012-11-07', 3, 'Пётр');
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>insert() - <span class="h2">Вставка записи</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "INSERT INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);";
$result = GDDatabase::Init()->insert($sql, array(4, 'Антон', '2012-11-07'));
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "INSERT INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);";
$result = GDDatabase::Init()->insert($sql, 4, 'Антон', '2012-11-07');
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>replace() - <span class="h2">Перезапись записи</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "REPLAСE INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);"
$result = GDDatabase::Init()->replace($sql, array(4, 'Антон', '2012-11-07'));
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "REPLAСE INTO #__table (id, name_t, date_t) VALUES (?, ?, ?);"
$result = GDDatabase::Init()->replace($sql, 4, 'Антон', '2012-11-07');
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>delete() - <span class="h2">Удаление записи</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "DELETE FROM #__table WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->delete($sql, array(4, 'Антон'));
            </code>
        </pre>
        или
        <pre>
            <code class="php">
$sql = "DELETE FROM #__table WHERE id=? AND name_t=?";
$result = GDDatabase::Init()->delete($sql, 4, 'Антон');
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div><h2>Транзакция</h2>

        <h3>Использование транзакции:</h3>
        <pre>
            <code class="php">
$db=GDDatabase::Init();
$db->transactionStart();
$db->insert('INSERT INTO #__table set testval =?',20);
$db->insert('INSERT INTO #__table set testval =?',10);
$db->insert('INSERT INTO #__table set testval =?',123);
$db->transactionCommit();
            </code>
        </pre>

        <h3>Откат текущей транзакции:</h3>
        <pre>
            <code class="php">
$db=GDDatabase::Init();
$db->transactionStart();
$db->insert('INSERT INTO #__table set testval =?',20);
$db->insert('INSERT INTO #__table set testval =?',10);
$db->insert('INSERT INTO #__table set testval =?',123);
$db->transactionRollBack();
$db->transactionCommit();
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>clearTable() - <span class="h2">Оцистка таблицы от данных</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$result = GDDatabase::Init()->clearTable('#__table');
print_r($result);
            </code>
        </pre>
        <h3>Результат:</h3>
        <p>В случае удачи, возвращает TRUE. Если произошла ошибка, вернётся FALSE.</p>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>simpleQuery() - <span class="h2">Простое выполнение запроса</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$sql = "SELECT id, name_t, date_t FROM #__table WHERE id = 1 OR name_t = 'Степан'";
$result = GDDatabase::Init()->simpleQuery($sql);
print_r($result->fetch_all());
            </code>
        </pre>
        <h3>Результат:</h3>
        <?php $result = GDDatabase::Init()->simpleQuery("SELECT id, name_t, date_t FROM #__table WHERE id=1 OR name_t= 'Степан'"); ?>
        <pre><code><?php print_r($result->fetch_all()); ?></code></pre>
    </div>
    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>getQueryInfo() - <span class="h2">Получение дополнительной информации о последнем запросе</span></h2>

        <h3>Пример:</h3>
            <pre>
                <code class="php">
GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id>?, 6);
$result = GDDatabase::Init()->getQueryInfo();
                </code>
            </pre>
        <h3>Результат:</h3>
            <pre>
                <code>
                    <?php
GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id>?", 6);
$result = GDDatabase::Init()->getQueryInfo();
print_r($result);
                    ?>
                </code>
            </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>getError() - <span class="h2">Описание ошибки последнего запроса</span></h2>

        <h3>Пример:</h3>
            <pre>
                <code class="php">
GDDatabase::Init()->select("SELECT id, no_name_s, date_t FROM #__table WHERE id > ?", 6);
$result = GDDatabase::Init()->getError();
                </code>
            </pre>
        <h3>Результат:</h3>
        <pre>
            <code>
            <?php
            GDDatabase::Init()->select("SELECT id, no_name_s, date_t FROM #__table WHERE id >?", 6);
            $result = GDDatabase::Init()->getError();
            print_r($result);
            ?>
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div>
        <h2>getErrno() - <span class="h2">Описание номера ошибки последнего запроса</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
GDDatabase::Init()->select("SELECT id, names, date_t FROM #__table WHERE id > ?", 6);
$result = GDDatabase::Init()->getErrno();
                   </code>
               </pre>
        <h3>Результат:</h3>
        <pre>
            <code>
        <?php
        GDDatabase::Init()->select("SELECT id, NAMES, date_t FROM #__table WHERE id>?", 6);
        $result = GDDatabase::Init()->getErrno();
        ?><?php print_r($result); ?>
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div><h2>showProfiles() - <span class="h2">Показать профилирование запросов</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id >= ?", 3);
GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id < ?", 3);
$result = GDDatabase::Init()->showProfiles();
            </code>
        </pre>
        <h3>Результат:</h3>
        <pre>
            <code>
<?php
    GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id >= ?", 3);
    GDDatabase::Init()->select("SELECT id, name_t, date_t FROM #__table WHERE id < ?", 3);
    $result = GDDatabase::Init()->showProfiles();
    print_r($result);
    ?>
            </code>
        </pre>
    </div>

    <!--------------------------------------------------------------------------------------->

    <div><h2>getObject() - <span class="h2">Возвращает обьект класса mysqli для нереализованных операций</span></h2>

        <h3>Пример:</h3>
        <pre>
            <code class="php">
$result = GDDatabase::Init()->getObject();
            </code>
        </pre>
        <h3>Результат:</h3>
        <pre><code><?php print_r(GDDatabase::Init()->getObject());?></code></pre>
    </div>
    <?php

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


