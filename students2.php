<?php
$url = 'http://localhost/20160327_xml/students.php';

$simpleXml = simplexml_load_file($url);
var_dump($simpleXml);