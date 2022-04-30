
<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>豆瓣高分电影</h2> <a class="more" href="/moreMsg/doubanfilmsMsg/{{config('TypesID.FILMSID')}}/0">更多>></a></li>
        @foreach($doubanfilmsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>