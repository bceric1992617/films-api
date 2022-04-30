<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('home.layouts.head')
    </head>
    <body>
        @include('home.layouts.navTypeSearch')
        <div id="body">
            <div class="msg">
                <table class='searchMsg'>
                    @if(empty($searchList[0]))
                        <p class='wrongMsg'>{{$searchWrongMsg}}</p>
                    @else
                        @foreach($searchList as $v)
                            <tr>
                                <td colspan="5" class='filmName'><h2><a title='{{$v->filmsName}}' href="/detail/{{$v->filmsId}}">{{$v->filmsName}}</a></h2></td>
                            </tr>
                            <tr  class="borderStyle">
                                <td><b>类型</b>&nbsp;:&nbsp;
                                    @if($v->tags)
                              
                                        {{$tags[$v->tags]}}
                                    @else
                                        暂无信息
                                    @endif
                                </td>
                                <td><b>国家</b>&nbsp;:&nbsp;
                                    @if($contries[$v->countries-1]->chineseName)
                                    {{$contries[$v->countries-1]->chineseName}}
                                    @else
                                        暂无信息
                                    @endif
                                </td>
                                
                                <td><b>片长</b>&nbsp;:&nbsp;
                                    @if($v->filmLength)
                                        {{$v->filmLength}}
                                    @else
                                        暂无信息
                                    @endif
                                </td>
                                <td><b>豆瓣</b>&nbsp;:&nbsp;
                                    @if($v->douban)
                                        {{$v->douban}}
                                    @else
                                        暂无信息
                                    @endif
                                </td>
                                <td><b>上映日期</b>&nbsp;:&nbsp;
                                    @if($v->years)
                                    {{date('Y',$v->years)}}
                                    @else
                                        暂无信息
                                    @endif
                                </td>
                            </tr>
                        @endforeach  
                    @endif
                </table>
        
            </div>
         
        </div>
        @include("home.layouts.foot")
    </body>
</html>
