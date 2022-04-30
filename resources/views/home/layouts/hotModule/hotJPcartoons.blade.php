<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new">日本动漫推荐 <a class="more" href="/moreMsg/JPCartoonsMsg/{{config('TypesID.CARTOONSID')}}/0">更多>></a></li>
        @foreach($JPCartoonsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>