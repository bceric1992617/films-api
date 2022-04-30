<div id='new' class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <ul>
        <li class="new"><h2>DC电影</h2> <a class="more" href="/moreMsg/DCFilmsMsg/{{config('TypesID.SUPERHEROSID')}}/0">更多>></a></li>
        @foreach($DCFilmsMsg as $v)
            @include("home.layouts.hotModule.videoMsg")
        @endforeach
    </ul>            
</div>