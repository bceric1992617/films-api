<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>大陆综艺节目</h2> <a class="more" href="/moreMsg/CHTVshowsMsg/{{config('TypesID.TVSHOWSID')}}/0">更多>></a></li>
        @foreach($CHTVshowsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>