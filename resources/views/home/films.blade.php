<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")
    </head>
    <body>
       @include("home.layouts.navTypeSearch")
        <div id="body">
            <!-- 热门电影 -->
            @include("home.layouts.hotModule.hotFilms")
            <!-- 最新电影 -->
            @include("home.layouts.hotModule.newFilms")
            <!-- 豆瓣高分 -->
            @include("home.layouts.hotModule.doubanFilms")
            <!-- 欧美电影 -->
            @include("home.layouts.hotModule.EURfilms")
            <!-- 经典电影 -->
            @include("home.layouts.hotModule.classicFilms")
            <!-- 热门韩国 -->
            @include("home.layouts.hotModule.hotKoreaFilms")
            <!-- 热门日本 -->
            @include("home.layouts.hotModule.hotJPFilms")
            <!-- 热门华语 -->
            @include("home.layouts.hotModule.hotCHFilms")    
        </div>  
        @include("home.layouts.foot")

    </body>
</html>
