<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")

    </head>
    <body>
       @include("home.layouts.navTypeSearch")
        <div id="body">
            <!-- 热门综艺 -->
            @include("home.layouts.hotModule.hotTVshows")
            <!-- 大陆综艺 -->
            @include("home.layouts.hotModule.CHTVshows")
            <!-- 最近更新 -->
            @include("home.layouts.hotModule.newTVshows")
        </div>  
        @include("home.layouts.foot")

    </body>
</html>
