php
===

php学习笔记

####查看数据库

    SHOW DATABASES;

####切换到test数据库
    USE test

####显示数据表

    SHOW TABLES;

####创建一个pet表

    CREATE TABLE pet (
        name VARCHAR(20), owner VARCHAR(20),
        species VARCHAR(20), sex CHAR(1), birth DATE, death DATE
    );

####导入一个记事本文件到数据表

    LOAD DATA LOCAL INFILE 'C:/wamp/www/Dropbox/php/src/mail.txt' INTO TABLE mail
    LINES TERMINATED BY '\r\n';





