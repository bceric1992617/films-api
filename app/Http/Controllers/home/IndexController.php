<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\common\Types;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\common\PublicFunc;

class IndexController extends Controller {
    //电影
    public function films($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        //热门电影
        $hotfilmsMsg = self::getVideoMsg(config('hotTypesID.filmsHotID'));
        //最新电影
        $newfilmsMsg = self::getVideoMsg(config('hotTypesID.filmsNewID'));
        //豆瓣高分
        $doubanfilmsMsg = self::getVideoMsg(config('hotTypesID.doubanfilmsMsgID'));
        //热门欧美
        $EURtfilmsMsg = self::getVideoMsg(config('hotTypesID.EURtfilmsMsgID'));
        //经典电影
        $classicsfilmsMsg = self::getVideoMsg(config('hotTypesID.classicsfilmsMsgID'));
        //热门华语
        $CHfilmsMsg = self::getVideoMsg(config('hotTypesID.CHfilmsMsgID'));
        //热门韩国
        $KoreatfilmsMsg = self::getVideoMsg(config('hotTypesID.KoreatfilmsMsgID'));
        //热门日本
        $JPfilmsMsg = self::getVideoMsg(config('hotTypesID.JPfilmsMsgID'));

        $head = PublicFunc::headDefaultMsg();
        // dump($head);die;
        $value = [
            "hotfilmsMsg" => $hotfilmsMsg,
            "newfilmsMsg" => $newfilmsMsg,
            "doubanfilmsMsg" => $doubanfilmsMsg,
            "EURtfilmsMsg" => $EURtfilmsMsg,
            "classicsfilmsMsg" => $classicsfilmsMsg,
            "CHfilmsMsg" => $CHfilmsMsg,
            "KoreatfilmsMsg" => $KoreatfilmsMsg,
            "JPfilmsMsg" => $JPfilmsMsg,
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year)
        ];

        return view("home.films")->with(array_merge($head, $value));
    }

    //电视剧
    public function soaps($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        //热门剧
        $SoapsHotMsg = self::getVideoMsg(config('hotTypesID.SoapsHotID'));
        //热门美剧
        $USSoapMsg = self::getVideoMsg(config('hotTypesID.USSoapsHotID'));
        //热门英剧
        $UKSoapMsg = self::getVideoMsg(config('hotTypesID.UKSoapsHotID'));
        //热门韩剧
        $KoreaSoapMsg = self::getVideoMsg(config('hotTypesID.KoreaSoapsHotID'));
        //热门日剧
        $JPSoapMsg = self::getVideoMsg(config('hotTypesID.JPSoapsHotID'));
        //热门港剧
        $HKSoapMsg = DB::table('films')->where('tags','=',config('TypesID.HONGKONGID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();
        //热门国产剧
        $CHSoapMsg = DB::table('films')->where('tags','=',config('TypesID.CHINESEID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();

        $head = PublicFunc::headDefaultMsg();

        $value = [
            "SoapsHotMsg" => $SoapsHotMsg,
            "USSoapMsg" => $USSoapMsg,
            "UKSoapMsg" => $UKSoapMsg,
            "KoreaSoapMsg" => $KoreaSoapMsg,
            "JPSoapMsg" => $JPSoapMsg,
            "CHSoapMsg" => $CHSoapMsg,
            "HKSoapMsg" => $HKSoapMsg,
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year)
        ];

        return view("home.soaps")->with(array_merge($head, $value));
    }

    //综艺
    public function TVshows($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        //热门综艺
        $hotTVshowsMsg = self::getVideoMsg(config('hotTypesID.TVshowsID'));
        //大陆综艺
        $CHTVshowsMsg = DB::table('films')->where('tags','=',config('TypesID.CHINESETVID'))->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();
        //最近更新
        $newTVshowsMsg = DB::table('films')->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();
        $head = PublicFunc::headDefaultMsg();

        // dump(simplifyNames('猫猫-纯心之谷的英雄们纯心英雄第一季'));die;
        $value = [
            "TVMsg" => $hotTVshowsMsg,
            "CHTVshowsMsg" => $CHTVshowsMsg,
            "newTVshowsMsg" => $newTVshowsMsg,
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year)
        ];
        
        return view("home.TVshows")->with(array_merge($head, $value));
    }

    //卡通
    public function cartoons($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        //热门动画
        $hotCartoonMsg = self::getVideoMsg(config('hotTypesID.JPCartoonID'));
        //日本动漫
        $JPCartoonsMsg = DB::table('films')->where('tags','=',config('TypesID.JAPANESECARTOONID'))->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();
        //最近更新
        $newCartoonsMsg = DB::table('films')->where('types','=',config('TypesID.CARTOONSID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();
        $head = PublicFunc::headDefaultMsg();
        
        $value = [
            "hotCartoonMsg" => $hotCartoonMsg,
            "JPCartoonsMsg" => $JPCartoonsMsg,
            "newCartoonsMsg" => $newCartoonsMsg,
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year)
        ];

        return view("home.cartoons")->with(array_merge($head, $value));
    }

    //漫威DC
    public function superHero($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        //漫威
        $marvelFilmsMsg = self::getSuperHeroMsg(config('superHeroTypesID.MARVELTYPESID'));
        //DC
        $DCFilmsMsg = self::getSuperHeroMsg(config('superHeroTypesID.DCTYPESID'));
        //豆瓣TOP
        $hotFilmsId = DB::table('doubanTop')->select('filmsId')->where('isDel','=',0)->get();
        $hotFilmsIdList = getArrValue(objToArray($hotFilmsId),'filmsId');
        $doubanTop = DB::table('films')->wherein('filmsId',$hotFilmsIdList)->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();

        $head = PublicFunc::headDefaultMsg();
        
        $value = [
            "marvelFilmsMsg" => $marvelFilmsMsg,
            "DCFilmsMsg" => $DCFilmsMsg,
            "doubanTop" => $doubanTop,
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year)
        ];

        return view("home.superHero")->with(array_merge($head, $value));
    }

    //豆瓣Top
    public function doubanTop($category=null,$soapType=null,$country=null,$filmtype=null,$year=null) {
        $doubanTop = DB::table('doubanTop')->select('filmsId')->where('isDel','=',0)->get();
        $doubanTopIdList = getArrValue(objToArray($doubanTop),'filmsId');
        $getFilmMsg = DB::table('films')->wherein('filmsId',$doubanTopIdList)->where('isDel','=','0')->orderBy('douban','desc')->get();
        $value = [
            "searchWrongMsg" => PublicFunc::wrongMsg(),
            "get" => PublicFunc::getGETParam($category,$soapType,$country,$filmtype,$year),
            "searchList" => $getFilmMsg
        ];
        $head = PublicFunc::headDefaultMsg();
        return view("home.moreMsg")->with(array_merge($value,$head));
    }

    //首页
    public function index() {
        //热门电影
        $hotfilmsMsg = self::getVideoMsg(config('hotTypesID.filmsHotID'));
        //最新电影
        $newfilmsMsg = self::getVideoMsg(config('hotTypesID.filmsNewID'));
        //豆瓣高分
        $doubanfilmsMsg = self::getVideoMsg(config('hotTypesID.doubanfilmsMsgID'));
        //热门欧美
        $EURtfilmsMsg = self::getVideoMsg(config('hotTypesID.EURtfilmsMsgID'));
        //经典电影
        $classicsfilmsMsg = self::getVideoMsg(config('hotTypesID.classicsfilmsMsgID'));
        //热门美剧
        $USSoapMsg = self::getVideoMsg(config('hotTypesID.USSoapsHotID'));
        //热门英剧
        $UKSoapMsg = self::getVideoMsg(config('hotTypesID.UKSoapsHotID'));
        //热门韩剧
        $KoreaSoapMsg = self::getVideoMsg(config('hotTypesID.KoreaSoapsHotID'));
        //热门日剧
        $JPSoapMsg = self::getVideoMsg(config('hotTypesID.JPSoapsHotID'));
        //热门港剧
        $HKSoapMsg = DB::table('films')->where('tags','=',config('TypesID.HONGKONGID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();
        //热门国剧
        $CHSoapMsg = DB::table('films')->where('tags','=',config('TypesID.CHINESEID'))->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();
        //热门动漫
        $hotCartoonMsg = self::getVideoMsg(config('hotTypesID.JPCartoonID'));
        //热门综艺
        $TVMsg = self::getVideoMsg(config('hotTypesID.TVshowsID'));
        //最近更新视频
        $newVideos = DB::table('films')->where('isDel','=','0')->orderBy('updateTime','desc')->take(20)->get();

        $head = PublicFunc::headDefaultMsg();
 
        $value = [
            "hotfilmsMsg" => $hotfilmsMsg,
            "newfilmsMsg" => $newfilmsMsg,
            "doubanfilmsMsg" => $doubanfilmsMsg,
            "EURtfilmsMsg" => $EURtfilmsMsg,
            "classicsfilmsMsg" => $classicsfilmsMsg,
            "USSoapMsg" => $USSoapMsg,
            "UKSoapMsg" => $UKSoapMsg,
            "KoreaSoapMsg" => $KoreaSoapMsg,
            "JPSoapMsg" => $JPSoapMsg,
            "HKSoapMsg" => $HKSoapMsg,
            "CHSoapMsg" => $CHSoapMsg,
            "hotCartoonMsg" => $hotCartoonMsg,
            "TVMsg" => $TVMsg,
            'newVideos' => $newVideos,
            "get" => PublicFunc::getDefaultMsg()
        ];

        return view("home.index")->with(array_merge($head, $value));
    }

    public static function getVideoMsg($type) {

        $hotFilmsId = DB::table('hot')->select('filmsId')->where('videoType','=',$type)->where('isDel','=',0)->get();
        $hotFilmsIdList = getArrValue(objToArray($hotFilmsId),'filmsId');
        return DB::table('films')->wherein('filmsId',$hotFilmsIdList)->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();
    }

    public static function getSuperHeroMsg($type) {
        $hotFilmsId = DB::table('superHero')->select('filmsId')->where('types','=',$type)->where('isDel','=',0)->get();
        $hotFilmsIdList = getArrValue(objToArray($hotFilmsId),'filmsId');
        return DB::table('films')->wherein('filmsId',$hotFilmsIdList)->where('isDel','=','0')->orderBy('douban','desc')->take(20)->get();
    }





}
