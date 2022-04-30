<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\common\Types;
use App\Http\Controllers\common\PublicFunc;

class PlayController extends Controller
{
    public function index($id,$category='',$soapType='',$country='',$filmtype='',$year='') {
        $idMsg = explode('-',$id);
        $filmsId = $idMsg[0];
        // dump($idMsg[1]);exit;
        $kuyunPlayAddr = DB::table('films as f')->select('p.playAddrId','p.filmsId','p.playAddr','p.playAddrName')->join('bajiecaiji as p','f.filmsId','=','p.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$filmsId)->where("p.linkType",'=','1')->orderBy('p.playAddrId','desc')->get();
        $m3u8PlayAddr = DB::table('films as f')->select('p.playAddrId','p.filmsId','p.playAddr','p.playAddrName')->join('bajiecaiji as p','f.filmsId','=','p.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$filmsId)->where("p.linkType",'=','2')->orderBy('p.playAddrId','desc')->get();
        // $magnetLink = DB::table('films as f')->select('m.downLink','m.linkName','m.linkType')->join('downLink as m','f.filmsId','=','m.filmsId')->where('f.isDel','=','0')->where('f.filmsId','=',$filmsId)->get();
        $playAddr = DB::table('films as f')->select('p.playAddr', 'p.linkType', 'p.playAddrName')->join('bajiecaiji as p','f.filmsId','=','p.filmsId')->where('f.isDel','=','0')->where('p.playAddrId','=',$idMsg[1])->where("p.linkType",'=',($idMsg[2] == 'k' ? 1 : 2))->get();
        $get = PublicFunc::getDefaultMsg();
        $get['id'] = $id;
  
        $filmName = DB::table('films')->select('filmsName')->where('isDel','=','0')->where('filmsId', '=', $filmsId)->get();
        $value = [
            "get" => $get,
            "filmName" => $filmName[0]->filmsName,
            "kuyunPlayAddr" => $kuyunPlayAddr,
            "m3u8PlayAddr" => $m3u8PlayAddr,
            // 'magnetLink' => $magnetLink,
            'playAddr' => $playAddr,
            'isDetail' => 0
        ];
        $head = PublicFunc::headDefaultMsg();
        return view("home.play")->with(array_merge($value,$head));
    }
}
