<?php

namespace App\Http\Controllers\common;
use App\Http\Controllers\common\Types;

class PublicFunc {
    #电影类型数据处理
    public static function processFilmtype($typeArr,$typeList) {
        $types = '';
        foreach($typeArr as $v) {
            $types .= $typeList[$v->typeStatus - 1]->chineseName . '/';
        }
        return $types;
    }

    #错误信息
    public static function wrongMsg() {
        return "没有找到任何信息。。。";
    }


    #get的默认值
    public static function getDefaultMsg() {
        $get = [];
        $get['category'] = 0;
        $get['soapType'] = 0;
        $get['country'] = 0;
        $get['filmtype'] = 0;
        $get['year'] = 0;

        return $get;
    }

    public static function getGETParam($category,$soapType,$country,$filmtype,$year) {
        $get = [];
        $get['category'] = $category ? $category : 0;
        $get['soapType'] = $soapType ? $soapType : 0;
        $get['country'] = $country ? $country : 0;
        $get['filmtype'] = $filmtype ? $filmtype : 0;
        $get['year'] = $year ? str_replace('以下','',$year) : 0;
        return $get;
    }

    public static function simplifyNames($str='') {
        $strlen = 9;
        if(strlen($str) > $strlen) {
            $str = substr($str, 0, $strlen) . '...';
        }
        return $str;
    }

    public static function headDefaultMsg() {
        return [
            "types" => Types::getVideoType(),
            "filmtypes" => Types::getFilmType(),
            "contries" => Types::getCountry(),
            "years" => Types::years(),
            "soapType" => Types::getSoapType(),
            "cartoonType" => Types::getcartoonType(),
            "tvType" => Types::getTvType(),
            'tags' => Types::getTagsType()
        ];
    }


    
}

