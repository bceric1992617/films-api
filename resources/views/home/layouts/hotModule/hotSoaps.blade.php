<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>热门电视剧</h2> <a class="more" href="/moreMsg/SoapsHotMsg/{{config('TypesID.SOAPSID')}}/0">更多>></a></li>
        @foreach($SoapsHotMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>