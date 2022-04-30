@if($v->years == 0)
    <li><a title='{{$v->filmsName}}' href="/detail/{{$v->filmsId}}"><span class='nameInfo'>[&nbsp;{{$contries[$v->countries-1]->chineseName}}&nbsp;] 
    @if($v->douban != "暂无评分" && !empty(trim($v->douban,' ')))
        [&nbsp;{{$v->douban}}&nbsp;]
    @endif
    </span>
    <i class='name'>{{simplifyNames($v->filmsName)}}</i> <span class="relaseTime">{{date("Y", $v->createTime)}}</span></a></li>
@else
    <li><a title='{{$v->filmsName}}' href="/detail/{{$v->filmsId}}"><span class='nameInfo'>[&nbsp;{{$contries[$v->countries-1]->chineseName}}&nbsp;] 
    @if($v->douban != "暂无评分" && !empty(trim($v->douban,' ')))
        [&nbsp;{{$v->douban}}&nbsp;]
    @endif
    </span>
    <i class='name'>{{simplifyNames($v->filmsName)}}</i> <span class="relaseTime">{{date("Y", $v->years)}}</span></a></li>
@endif