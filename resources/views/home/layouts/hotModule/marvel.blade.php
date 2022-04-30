<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>漫威电影</h2> <a class="more" href="/moreMsg/marvelFilmsMsg/{{config('TypesID.SUPERHEROSID')}}/0">更多>></a></li>
        @foreach($marvelFilmsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>