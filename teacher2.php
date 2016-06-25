<?php
header('Content-type:text/html;Charset=utf-8');
echo '<pre>';
$simpleXml = simplexml_load_file('teacher.xml');
foreach($simpleXml->teacher as $teacher){
    echo $teacher['sn'];
    echo (string)$teacher->name;
    echo (string)$teacher->age;
    echo (string)$teacher->sex;
    $students = $teacher->students->student;
    foreach($students as $student){
        echo (string)$student->name;
    }
}
//var_dump($simpleXml);