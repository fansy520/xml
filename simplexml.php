<?php
header('Content-type:text/html;Charset=utf-8');
echo '<pre>';
//1.实例化simplexml对象,加载xml文件
$simpleXml = simplexml_load_file('students.xml');
//$simpleXml = simplexml_load_string();
//2 获取所有student对象
$students = $simpleXml->student;

//3 循环获取每个student对象
foreach($students as $student){
    echo $student['sn'];//获取属性sn
    //获取name age sex
    echo (string)$student->name;
    echo (string)$student->age;
    echo (string)$student->sex;
   /* $name = (string)$student->name;
    echo $name;
    var_dump($name);
    exit;*/


}


//var_dump($students);