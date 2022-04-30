<?php

namespace App\Http\Controllers\common;
use Illuminate\Support\Facades\DB;

class Types {
    public static function getTagsType() {
        $tags = DB::table('filmtypesList')->select('*')->whereBetween('filmtypesListId',[1,1000])->get();
        $tagsList = [];
        foreach($tags as $key => $value) {
            $tagsList[$value->filmtypesListId] = $value->chineseName;
        }

        return $tagsList;
    }

    public static function getFilmType() {
        return DB::table('filmtypesList')->select('*')->where('isDel','=','0')->whereBetween('filmtypesListId',[1,99])->get();
    }

    public static function getCountry() {
        $country = DB::table('country')->select('*')->where('isDel','=','0')->get();
        $country[999] = clone $country[21];
        
        unset($country[21]);
        // dump($country);exit;
        return $country;
    }

    public static function getVideoType() {
        return DB::table('filmtypesList')->select('*')->where('isDel','=','0')->whereBetween('filmtypesListId',[400,499])->orderBy('sort','asc')->get();
    }

    public static function getSoapType() {
        return DB::table('filmtypesList')->select('*')->where('isDel','=','0')->whereBetween('filmtypesListId',[100,199])->get();
    }

    public static function getCartoonType() {
        return DB::table('filmtypesList')->select('*')->where('isDel','=','0')->whereBetween('filmtypesListId',[300,399])->get();
    }

    public static function getTvType() {
        return DB::table('filmtypesList')->select('*')->where('isDel','=','0')->whereBetween('filmtypesListId',[200,299])->get();
    }

    public static function years() {
        
        $year = date("Y");
        $year_list = [];
        for($i = 21; $i > 0; $i--) { //近期3年
            $year_list[] = $year--;
        }

        return $year_list;

    }
}
