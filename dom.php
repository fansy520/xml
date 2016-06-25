<?php
header('Content-type:text/html;Charset=utf-8');
//1 实例化dom对象
$dom = new DOMDocument();
//2 dom对象加载xml文件
//$dom->load('students.xml');
//读取xml字符串的
$xmlstr = file_get_contents('students.xml');
$dom->loadXML($xmlstr);
//3 获取文档的根节点
$students = $dom->documentElement;
//3 获取根节点students的子节点
$childNodes = $students->childNodes;
//4 循环获取students的子节点student
$length = $childNodes->length;

for($i=0;$i<$length;$i++){
    //item($i)根据索引获取子节点
    $student = $childNodes->item($i);
    //排除回车换行符(判断节点类型是否为元素 elementnode)
    if($student->nodeType == XML_ELEMENT_NODE){
        //获取student属性sn getAttribute('sn')
        $sn = $student->getAttribute('sn');
        echo 'sn='.$sn;
        //获取student的子节点
        $children = $student->childNodes;
        //循环遍历student的子节点
        foreach($children as $child){
            if($child->nodeType == XML_ELEMENT_NODE)
                //nodeName 获取节点名称    textContent  获取节点文本元素
            echo $child->nodeName.':'.$child->textContent;
        }
        echo '<br>';

    }


}



//var_dump($childNodes);
