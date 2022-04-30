<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")
         <link href="{{asset('home/css/video-js.css')}}" rel="stylesheet">
         <script src="{{asset('home/js/video.js')}}"></script>
         <script src="{{asset('home/js/videojs-contrib-hls.js')}}"></script>
         <script>
            $().ready(function() {
                if($(document).width() < 420) {
                    $('.videoStyle iframe').attr({"height" : '300'})
                }
            })
        </script>
    </head>
    <body>
        @include('home.layouts.navTypeSearch')
        <div class='videoStyle'>
            <h2>{{$filmName}}</h2>
            <p>{{$playAddr[0]->playAddrName}}</p>
            <h5>请耐心等10S，不可播放或卡顿请切换一下个播放</h5>
            @if($playAddr[0]->linkType == 1)

                <iframe allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" width='100%' height='500' scrolling='no' frameborder='0' src="{{$playAddr[0]->playAddr}}" frameborder="0">
                    浏览器不支持。。。。
                </iframe>
            @else
                <video id="my_video_1" class="video-js vjs-default-skin fillWidth" controls data-setup='{}'>
                    <source src="{{$playAddr[0]->playAddr}}" type="application/x-mpegURL">
                </video>
            @endif
        </div>
        @include("home.layouts.tab")
        @include("home.layouts.foot")

    </body>
</html>
