<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")
    </head>
    <body>
       @include("home.layouts.navTypeSearch")
        <div id="body">
            <!-- 热门剧 -->
            @include("home.layouts.hotModule.hotSoaps")
            <!-- 热门英剧 -->
            @include("home.layouts.hotModule.hotUKSoaps")
            <!-- 热门美剧 -->
            @include("home.layouts.hotModule.hotUSSoaps")
            <!-- 热门韩剧 -->
            @include("home.layouts.hotModule.hotKoreaSoaps")
            <!-- 热门日剧 -->
            @include("home.layouts.hotModule.hotJPSoaps")
            <!-- 热门港剧 -->
            @include("home.layouts.hotModule.hotHKSoaps")
            <!-- 热门国剧 -->
            @include("home.layouts.hotModule.hotCHSoaps")    
        </div>  
        @include("home.layouts.foot")

    </body>
</html>
