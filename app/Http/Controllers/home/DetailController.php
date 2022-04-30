<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\common\Types;
use App\Http\Controllers\common\PublicFunc;


class DetailController extends Controller
{
    public function index($id,$category='',$soapType='',$country='',$filmtype='',$year='') {
        //DB::connection()->enableQueryLog();
        $typeList = Types::getFilmType();
        $countryList = Types::getCountry();
        $filmMsg = DB::table('films')->where('isDel','=','0')->where('filmsId', '=', $id)->get();
        // $filmTypes = DB::table('films as f')->select('t.typeStatus')->join('filmtypes as t','f.filmsId','=','t.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$id)->get();
        // $magnetLink = DB::table('films as f')->select('m.downLink','m.linkName','m.linkType')->join('downLink as m','f.filmsId','=','m.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$id)->get();
        $kuyunPlayAddr = DB::table('films as f')->select('p.playAddrId','p.filmsId','p.playAddr','p.playAddrName','p.linkType')->join('bajiecaiji as p','f.filmsId','=','p.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$id)->where("p.linkType",'=','1')->orderBy('p.playAddrId','desc')->get();
        $m3u8PlayAddr = DB::table('films as f')->select('p.playAddrId','p.filmsId','p.playAddr','p.playAddrName','p.linkType')->join('bajiecaiji as p','f.filmsId','=','p.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$id)->where("p.linkType",'=','2')->orderBy('p.playAddrId','desc')->get();
      
        $recommend = DB::table('films')->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();   
        $country = $countryList[$filmMsg[0]->countries - 1]->chineseName;

        $value = [
            "recommend" => $recommend,
            "get" => PublicFunc::getDefaultMsg(),
            'filmMsg' => $filmMsg[0],
            // 'magnetLink' => $magnetLink,
            "kuyunPlayAddr" => $kuyunPlayAddr,
            "m3u8PlayAddr" => $m3u8PlayAddr,
            'country' => $country,
            'isDetail' => 1,
        ];
        $head = PublicFunc::headDefaultMsg();
        // dump($head);die;
        return view("home.detail")->with(array_merge($value,$head));
    }
}
