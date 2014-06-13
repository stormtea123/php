<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery.getJSON demo</title>
    <style>
    body { font-size:18px; }
    </style>
    <script srcv="http://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

<?php
    $con = mysql_connect('localhost','root','');
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db("w3cmm",$con);

    $sql = "SELECT * FROM pet";
    $result = mysql_query($sql,$con);
    echo mysql_num_rows($result);

    mysql_close($con);




    id  INT NOT NULL AUTO_INCREMENT,
    bookname VARCHAR(80) NOT NULL DEFAULT '',
    publisher VARCHAR(60) NOT NULL DEFAULT '',
    author VARCHAR(20) NOT NULL DEFAULT ''，
    price DOUBLE(5,2) NOT NULL DEFAULT 0.00,
    ptime INT NOT DEFAULT 0,
    pic CHAR(24) NOT NULL default '',
    PRIMARY KEY(id),
    INDEX books_bookname(bookname),
    INDEX books_publisher(publisher),
    INDEX books_price(price)

?>


</body>

</html>
