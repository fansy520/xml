<?php
header('Content-type:text/html;Charset=utf-8');
echo '<pre>';
$dom = new DOMDocument();//实例化dom对象
$dom->load('teacher.xml');//加载xml文件
$rootElement = $dom->documentElement;//获取根元素teachers
$teachers = $rootElement->childNodes;//获取teachers的子节点

$result = array();
for($i=0;$i<$teachers->length;$i++){//循环遍历teachers的子节点
    $teacher = $teachers->item($i);//按索引获取teacher节点
    if($teacher->nodeType == XML_ELEMENT_NODE){
        $sn = $teacher->getAttribute('sn');//获取teacher节点的sn属性
        $result[$sn] = array();
        $childNodes = $teacher->childNodes;//获取teacher的子节点
        foreach($childNodes as $childNode){//循环遍历teacher子节点
            if($childNode->nodeType == XML_ELEMENT_NODE){
                //判定节点名称是否是students,如果是,循环遍历子节点
                if($childNode->nodeName == 'students'){
//                    echo $childNode->nodeName.':'.$childNode->textContent.'<br>';
                    $result[$sn]['students']=array();
                    $studentNodes = $childNode->childNodes;//获取students的子节点
                    for($j=0;$j<$studentNodes->length;$j++){//循环遍历students的子节点
                        $student = $studentNodes->item($j);//获取student节点
                        if($student->nodeType == XML_ELEMENT_NODE){

                            foreach($student->childNodes as $node){//循环遍历student的子节点
                                if($node->nodeType == XML_ELEMENT_NODE){
//                                    echo $node->nodeName.':'.$node->textContent.'<br>';
                                    $result[$sn]['students'][$j][$node->nodeName]=$node->textContent;//将name=>值添加到数组
                                }
                            }
                        }
                    }
                }else{//如果不是students节点,直接输出文本内容
//                    echo $childNode->nodeName.':'.$childNode->textContent.'<br>';

                    $result[$sn][$childNode->nodeName]=$childNode->textContent;//将teacher的name age sex和对应值 添加到数组
                }
            }

        }
    }
}
var_dump($result);