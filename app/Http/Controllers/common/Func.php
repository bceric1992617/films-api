<?php

#简化名字（名字过长）
function simplifyNames($str='') {
    $strlen = 14;
    if(strlen($str) > $strlen) {
        $str = mb_substr($str, 0, $strlen);
    }
    return $str;
}

#对象转数组
function objToArray($obj) {
    return json_decode(json_encode($obj), true);
}

#获取sql的数据后提取ID成一维数组
function getArrValue($arr, $field) {
    foreach($arr as &$v) {
        $v = $v[$field];
    }
    return $arr;
}



