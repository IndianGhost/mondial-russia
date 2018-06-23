<?php

global $pdo;

try
{
  	$pdo = new PDO(
          'mysql:host='.DATABASE_HOST.'; dbname='.DATABASE_NAME,
           DATABASE_USER, 
           DATABASE_PASSWORD,
           array(
               PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            )
    );
}
catch (Exception $e)
{
    die('هناك خطأ ما بالسيرفر، سنحاول إصلاحه بأقرب وقت ممكن. المرجو العودة لاحقا' . $e->getMessage());
}
