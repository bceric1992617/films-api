<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")

    </head>
    <body>
       @include("home.layouts.navTypeSearch")
        <div id="body">
            <!-- 热门动画 -->
            @include("home.layouts.hotModule.hotcartoons")
            <!-- 日本动漫 -->
            @include("home.layouts.hotModule.hotJPcartoons")
            <!-- 最近更新 -->
            @include("home.layouts.hotModule.newJPcartoons")        
        </div>  
        @include("home.layouts.foot")

    </body>
</html>
