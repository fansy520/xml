<?php
header('Content-type:text/html;Charset=utf-8');
//http://flash.weather.com.cn/wmaps/xml/sichuan.xml  天气预报地址
//1 dom解析
$dom = new DOMDocument();
$dom->load('http://flash.weather.com.cn/wmaps/xml/sichuan.xml');
//$rootElement = $dom->documentElement;
//$cityNodes = $rootElement->childNodes;
$cityNodes = $dom->getElementsByTagName('city');//通过标签名称获取节点
for($i=0;$i<$cityNodes->length;$i++){
    $cityNode = $cityNodes->item($i);
    if($cityNode->nodeType == XML_ELEMENT_NODE){
        echo $cityNode->getAttribute('cityname');
        echo '->';
        echo $cityNode->getAttribute('stateDetailed');
        echo '<br>';
    }
}
//2 simplexml解析
$simpleXml = simplexml_load_file('http://flash.weather.com.cn/wmaps/xml/sichuan.xml');
foreach ($simpleXml->city as $city)
{
    echo $city['cityname'].'->'.$city['stateDetailed'];
}