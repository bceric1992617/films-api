<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")
    </head>
    <body>
        @include('home.layouts.navTypeSearch')

        <div id="body">
            <div class="detail">
                <img alt='图片展示无法显示' title='{{$filmMsg->filmsName}}' class='pic col-xs-12 col-sm-12 col-md-5 col-lg-5' src=
                    @if(strstr($filmMsg->mainPicAddr,'filmPics'))
                        {{asset('home').$filmMsg->mainPicAddr}}
                    @else
                        {{$filmMsg->mainPicAddr}}
                    @endif
                onerror=src="{{asset('home/filmPics/404/404.jpg')}}" />
                <div class="content col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <h2 style='font-weight:24px; font-size:36px'>{{$filmMsg->filmsName}}</h2>
                    <p><b>类型</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->tags))
                        {{$tags[$filmMsg->tags]}}
                    @else
                        暂无信息
                    @endif
                    </p>

                    <p><b>上映时间</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->years))
                    {{date('Y',$filmMsg->years)}}
                    @else
                        暂无信息
                    @endif
                    </p>

                    <p><b>导演</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->directors))
                    {{$filmMsg->directors}}
                    @else
                        暂无信息
                    @endif
                    </p>

                    <p><b>演员</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->stars))
                    {{$filmMsg->stars}}
                    @else
                        暂无信息
                    @endif
                    </p>

                    <p><b>国家</b>&nbsp;:&nbsp;{{$country}}</p>
                    
                    <p><b>片长</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->filmLength))
                        {{$filmMsg->filmLength}}分
                    @else
                        暂无信息
                    @endif
                    </p>

                    <p><b>豆瓣</b>&nbsp;:&nbsp;
                    @if(!empty($filmMsg->douban))
                        {{$filmMsg->douban}}
                    @else
                        暂无信息
                    @endif 
                    </p>

                    <p><b>简介</b>&nbsp;:&nbsp;
                    @if(!empty(preg_replace("/\r|\n|\t/",'',$filmMsg->content)))
                        <h2 class='contentKeyWord'>{{$filmMsg->filmsName}}剧情讲述了</h2>{{$filmMsg->content}}
                    @else
                        暂无信息
                    @endif 
                </p>
                </div>
            </div>

        </div>
        @include("home.layouts.tab")
        @include("home.layouts.foot")
    </body>
</html>
