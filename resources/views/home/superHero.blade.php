<!DOCTYPE html>
<html>
    <head>
        @include("home.layouts.head")

    </head>
    <body>
       @include("home.layouts.navTypeSearch")
        <div id="body">
            <!-- 漫威 -->
            @include("home.layouts.hotModule.marvel")
            <!-- DC -->
            @include("home.layouts.hotModule.DC")
            <!-- 豆瓣250TOP -->
            @include("home.layouts.hotModule.doubanTop")        
        </div>  
        @include("home.layouts.foot")

    </body>
</html>
