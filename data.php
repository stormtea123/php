<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>链接数据库</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
        $link = mysql_connect('localhost','root','');
        if (!$link) {
            die('链接失败：'.mysql_error());
        } else {
            echo '数据库连接成功.<br>';
        }
        //选择数据库
        mysql_select_db('w3cmm',$link)or die("失败".mysql_error());
        //判断表是否存在
        if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '". "books"."'"))>0) {
            echo "数据表已经存在，不需要重新创建<br>";
        } else {
            $booksSql = "CREATE TABLE BOOKS
            (
                id INT NOT NULL AUTO_INCREMENT,
                PRIMARY KEY(id),
                name CHAR(15),
                bookName CHAR(15)
            )";
            mysql_query($booksSql);
            echo "创建数据成功";
        }

        //echo mysql_stat();
            $insert = "INSERT INTO books(name,bookName) VALUES
            ('joain','javascript'),
            ('marry','javascript'),
            ('zhangsan','javascript'),
            ('lisi','php')";
        $result = mysql_query($insert);
        if ($result && mysql_affected_rows()>0) {
            echo "数据记录插入成功，最后一条插入的数据记录ID为:".mysql_insert_id()."<br>";
        } else {
            echo "插入失败，错误号为：".mysql_error()."错误原因：".mysql_error()."<br>";
        }
        $resultNum = mysql_query("SELECT*FROM BOOKS");
        echo "行数：".mysql_num_rows($resultNum)."<br>";
        echo "列数：".mysql_num_fields($resultNum)."<br>";
        //显示数据
        //查找字段

        $rsultString = mysql_query("SELECT id, name, bookName FROM BOOKS");

        echo '<table>';
        echo '<caption>从数据库里读取数据</caption>';
        echo '';
        while($row = mysql_fetch_row($rsultString)){
            echo '<tr>';
            foreach($row as $data) {
                echo '<td>'.$data.'</td>';
            }
            echo '</tr>';
        }
        echo'</table>';
        
        //关闭数据库
        mysql_close($link);
    ?>
</body>

</html>
