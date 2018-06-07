<?php
try {
  	$db = new PDO('mysql:host=127.0.0.1; dbname=culture', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
} catch (Exception $e) {
    die('هناك خطأ ما بالسيرفر، سنحاول إصلاحه بأقرب وقت ممكن. المرجو العودة لاحقا' . $e->getMessage());
}
?>
