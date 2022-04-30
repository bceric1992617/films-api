<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")
    </head>
    <body>
    @include('home.layouts.navTypeSearch')
        <div id="body">
            <!-- 最热电影 -->
            @include("home.layouts.hotModule.hotFilms")
            <!-- 最新电影 -->
            @include("home.layouts.hotModule.newFilms")
            <!-- 最近更新 -->
            @include("home.layouts.hotModule.newVideos")
            <!-- 豆瓣高分 -->
            @include("home.layouts.hotModule.doubanFilms")
            <!-- 欧美电影 -->
            @include("home.layouts.hotModule.EURfilms")
            <!-- 经典电影 -->
            @include("home.layouts.hotModule.classicFilms")
            <!-- 热门美剧 -->
            @include("home.layouts.hotModule.hotUSSoaps")
            <!-- 热门港剧 -->
            @include("home.layouts.hotModule.hotHKSoaps")
            <!-- 热门国剧 -->
            @include("home.layouts.hotModule.hotCHSoaps")
            <!-- 热门韩剧 -->
            @include("home.layouts.hotModule.hotKoreaSoaps")
            <!-- 热门英剧 -->
            @include("home.layouts.hotModule.hotUKSoaps")
            <!-- 热门日剧 -->
            @include("home.layouts.hotModule.hotJPSoaps")
        </div>

        @include("home.layouts.foot")
    </body>
</html>
