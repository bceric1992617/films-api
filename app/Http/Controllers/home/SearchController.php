<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\common\Types;
use App\Http\Controllers\common\PublicFunc;

class SearchController extends Controller
{   

    public function typeSearchMsg($category='',$soapType='',$country='',$filmtype='',$year='',$pageNum=0) {
        // //DB::connection()->enableQueryLog();
        $get = PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year);
        $searchList = DB::table('films')->where('isDel','=','0');
        if($soapType) {
            $filmtype = $soapType;
        }
        if($category) {
            $searchList = $searchList->where('types','=',$category);
        }
        if($filmtype) {
            $searchList = $searchList->where('tags','=',$filmtype);
        }
        if($country) {
            $searchList = $searchList->where('countries','=',$country);
        }
        if($year) {
            $beginTime = strtotime($get['year']."-01-01 00:00:00");
            $endTime = strtotime($get['year']."-12-31 23:59:59");
            $searchList = $searchList->whereBetween('years', [$beginTime, $endTime], 'and', false);
        }
        $count = $searchList->count();
        $msgLimitNum = 20;
        $searchList = $searchList->offset($pageNum * $msgLimitNum)->take($msgLimitNum)->orderBy('years','desc')->get();
  
        $value = [
            "searchWrongMsg" => PublicFunc::wrongMsg(),
            "get" => $get,
            "searchList" => $searchList,
            "nowPage" => $pageNum, #现在的页数
            "count" => floor($count / $msgLimitNum), #有多少页
            "pageLimit" => 6, #页数限制
        ];
        
        $head = PublicFunc::headDefaultMsg();
        return view("home.typeSearchMsg")->with(array_merge($value,$head));
    }

    public function moreMsg($type='',$category='',$pageNum = 0,$soapType='',$country='',$filmtype='',$year='') {
        $get = PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year);
        $getFilmMsg = $this->getFilmMsg($type, $pageNum, $category);
        $value = [
            "searchWrongMsg" => PublicFunc::wrongMsg(),
            "get" => PublicFunc::getDefaultMsg(),
            "searchList" => $getFilmMsg
        ];
        $head = PublicFunc::headDefaultMsg();
        return view("home.moreMsg")->with(array_merge($value,$head));
    }



    public function searchMsg(Request $request) { 
        $key = $request->input('search');
        $searchList = DB::table('films')->where('isDel','=','0')->where('filmsName','like','%'.$key.'%')->orderBy('years','desc')->take(40)->get();
        $head = PublicFunc::headDefaultMsg();
        $value = [
            "searchWrongMsg" => PublicFunc::wrongMsg(),
            "searchList" => $searchList,
            "get" => PublicFunc::getDefaultMsg(),
        ];
        return view("home.search")->with(array_merge($value,$head));
    }

    public function getFilmMsg($type,$page,$category) {
        $filmTableField = [
            'hotfilmsMsg' => config('hotTypesID.filmsHotID'),
            'newfilmsMsg' => config('hotTypesID.filmsNewID'),
            'doubanfilmsMsg' => config('hotTypesID.doubanfilmsMsgID'),
            'EURtfilmsMsg' => config('hotTypesID.EURtfilmsMsgID'),
            'classicsfilmsMsg' => config('hotTypesID.classicsfilmsMsgID'),
            'CHfilmsMsg' => config('hotTypesID.CHfilmsMsgID'),
            'KoreatfilmsMsg' => config('hotTypesID.KoreatfilmsMsgID'),
            'JPfilmsMsg' => config('hotTypesID.JPfilmsMsgID'),
            'SoapsHotMsg' => config('hotTypesID.SoapsHotID'),
            'USSoapMsg' => config('hotTypesID.USSoapsHotID'),
            'UKSoapMsg' => config('hotTypesID.UKSoapsHotID'),
            'KoreaSoapMsg' => config('hotTypesID.KoreaSoapsHotID'),
            'JPSoapMsg' => config('hotTypesID.JPSoapsHotID'),
            // 'CHSoapMsg' => config('hotTypesID.CHSoapsHotID'),
            // 'HKSoapMsg' => config('hotTypesID.HKSoapsHotID'),
            'hotCartoonsMsg' => config('hotTypesID.JPCartoonID'),
            'hotCartoonsMsg' => config('hotTypesID.filmsHotID'),
            'hotTVshowsMsg' => config('hotTypesID.TVshowsID'),
            'marvelFilmsMsg' => config('superHeroTypesID.MARVELTYPESID'),
            'DCFilmsMsg' => config('superHeroTypesID.DCTYPESID')
            // 'doubanTop' => config('hotTypesID.TVshowsID'),
        ];
        // DB::connection()->enableQueryLog();
        $limit = 100;
        if($type == 'CHTVshowsMsg') { //大陆综艺
            return DB::table('films')->where('tags','=',config('TypesID.CHINESETVID'))->where('isDel','=','0')->orderBy('douban','desc')->take($limit)->get();
        }
        if($type == 'newTVshowsMsg') { //综艺最近更新
            return DB::table('films')->where('isDel','=','0')->orderBy('updateTime','desc')->take($limit)->get();
        }

        if($type == 'JPCartoonsMsg') {//日本动漫
            return DB::table('films')->where('tags','=',config('TypesID.JAPANESECARTOONID'))->where('isDel','=','0')->orderBy('douban','desc')->take($limit)->get();
        }
        if($type == 'newCartoonsMsg') {//动画最近更新
            return DB::table('films')->where('types','=',config('TypesID.CARTOONSID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take($limit)->get();
        }
        if($type == 'marvelFilmsMsg') {//获取漫威
            return self::getsuperHeroMsg($filmTableField[$type]);
        }
        if($type == 'DCFilmsMsg') {//获取DC
            return self::getsuperHeroMsg($filmTableField[$type]);
        }
        if($type == 'CHSoapMsg') {//港产剧
            return DB::table('films')->where('tags','=',config('TypesID.CHINESEID'))->where('isDel','=','0')->orderBy('updateTime','asc')->take($limit)->get();
        }
        if($type == 'HKSoapMsg') {//国产剧
            return DB::table('films')->where('tags','=',config('TypesID.HONGKONGID'))->where('isDel','=','0')->orderBy('updateTime','asc')->take($limit)->get();
        }
        if($type == 'newVideos') {//国产剧
            return DB::table('films')->where('isDel','=','0')->orderBy('updateTime','desc')->take($limit)->get();
        }
        // //热门国产剧

        //获取首页，电影，连续剧，综艺和动漫信息
        return self::getVideoMsg($filmTableField[$type],$limit);
    }


    //获取漫，DC信息
    public static function getsuperHeroMsg($id) {
        $hotFilmsId = DB::table('superHero')->select('filmsId')->where('types','=',$id)->where('isDel','=',0)->get();
        $hotFilmsIdList = getArrValue(objToArray($hotFilmsId),'filmsId');
        // dump($id);die;
        return DB::table('films')->wherein('filmsId',$hotFilmsIdList)->where('isDel','=','0')->orderBy('douban','desc')->get();
    }

    //获取首页，电影，连续剧，综艺和动漫信息
    public static function getVideoMsg($id,$limit) {
        $hotFilmsId = DB::table('hot')->select('filmsId')->where('videoType','=',$id)->where('isDel','=',0)->get();
        $hotFilmsIdList = getArrValue(objToArray($hotFilmsId),'filmsId');
        return DB::table('films')->wherein('filmsId',$hotFilmsIdList)->where('isDel','=','0')->orderBy('douban','desc')->take($limit)->get();
    }
}
