<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>日本电影推荐</h2> <a class="more" href="/moreMsg/JPfilmsMsg/{{config('TypesID.FILMSID')}}/0">更多>></a></li>
        @foreach($JPfilmsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>