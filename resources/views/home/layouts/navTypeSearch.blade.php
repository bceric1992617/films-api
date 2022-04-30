
<!-- PC导航 -->
<div class='hidden-xs' id="nav">
    <h1><a class='index' href="{{url('/')}}">白菜电影</a></h1>
    <br/>
    <ul class="nav nav-pills">
        <li
        @if($get['category'] == 0)
            class='active'
        @endif
        ><a href="{{url('index')}}"><b>首页</b></a></li>
        @foreach($types as $v)
            <li
            @if($get['category'] == $v->filmtypesListId)
                class='active'
            @endif
            ><a title='{{$v->chineseName}}' href="{{url('/')}}/{{$v->englishName}}/{{$v->filmtypesListId}}"><b>{{$v->chineseName}}</b></a></li>
        @endforeach
    </ul>
    <nav class="navbar search hidden-xs" role="navigation">
        <form action="/search" method="POST" class="navbar-form" role="search">
            @csrf
            <div class="form-group" >
                <input class="container" name="search" type="text" class="form-control" placeholder="电影名字...">
            </div>
            <input type="submit" class="btn btn-default searchBtnForPc" value="搜索"/>
        </form>  
    </nav>

</div>

<!-- 视频分类 -->
@if(!in_array($get['category'],[config('TypesID.SUPERHEROSID'),config('TypesID.DOUBANTOPSID')]))
    <div id="head" class='hidden-xs' 
    @if(in_array($get['category'],[config('TypesID.SOAPSID'),config('TypesID.TVSHOWSID'),config('TypesID.CARTOONSID')]))
    style="height:80px"
    @endif
    >
        @if($get['category'] == config('TypesID.SOAPSID'))
            <ul>
                <li><a 
                    @if($get['soapType'] == 0)
                        class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
                @foreach($soapType as $v)
                    <li><a title='{{$v->chineseName}}'
                        @if($get['soapType'] == $v->filmtypesListId)
                        class='navDefault'
                        @endif
                        href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0"><h2>{{$v->chineseName}}</h2></a></li>
                @endforeach
            </ul>
        @elseif($get['category'] == config('TypesID.TVSHOWSID'))
            <ul>
                <li><a 
                    @if($get['soapType'] == 0)
                        class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
                @foreach($tvType as $v)
                    <li><a title='{{$v->chineseName}}'
                        @if($get['soapType'] == $v->filmtypesListId)
                        class='navDefault'
                        @endif
                        href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0"><h2>{{$v->chineseName}}</h2></a></li>
                @endforeach
            </ul>
        @elseif($get['category'] == config('TypesID.CARTOONSID'))
            <ul>
                <li><a 
                    @if($get['soapType'] == 0)
                        class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
                @foreach($cartoonType as $v)
                    <li><a title='{{$v->chineseName}}'
                        @if($get['soapType'] == $v->filmtypesListId)
                        class='navDefault'
                        @endif
                        href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0"><h2>{{$v->chineseName}}</h2></a></li>
                @endforeach
            </ul>
        @else
            <ul id="contries">
                <li><a 
                    @if($get['country'] == 0)
                        class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/0/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
                @foreach($contries as $v)
                    <li><a title='{{$v->chineseName}}'
                    @if($get['country'] == $v->countryId)
                    class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$v->countryId}}/{{$get['filmtype']}}/{{$get['year']}}/0">{{$v->chineseName}}</a></li>
                @endforeach
            </ul>
            <ul id="film-types">
                <li><a 
                    @if($get['filmtype'] == 0)
                        class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/0/{{$get['year']}}/0">全部</a></li>
                @foreach($filmtypes as $v)
                    <li><a title='{{$v->chineseName}}'
                    @if($get['filmtype'] == $v->filmtypesListId)
                    class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$v->filmtypesListId}}/{{$get['year']}}/0">{{$v->chineseName}}</a></li>
                @endforeach
            </ul>
        @endif

        <ul id="years">
            <li><a 
                @if($get['year'] == 0)
                    class='navDefault'
                @endif
                href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$get['filmtype']}}/0/0">全部</a></li>
            @foreach($years as $v)
                <li><a
                @if($get['year'] == $v)
                    class='navDefault'
                @endif
                href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$get['filmtype']}}/{{$v}}/0">{{$v}}</a></li>
            @endforeach
        </ul>
    </div>
@endif
<!-- 手机导航 -->
<div class='mobileNav visible-xs' id="nav">
    <div class="logoBar">
        
        <p>
            <ul class="nav nav-pills">
                <li id="mobileTypeBtn" class="active">
                    <a href="javascript:void(0)">
                        <span class="glyphicon glyphicon-list"></span>
                    </a>
                </li>
            </ul>
        </p>

        <p class="logo">
            <b>白菜电影</b>
        </p>
        <p class='searchBtn'>
            <button style="border-color:#000" type="button" class="btn btn-default btn-sm">
                <span class="searchImg glyphicon glyphicon-search"></span>
            </button>
        </p>
    </div>

    <ul class="nav nav-pills hidden-sx">
        <li
        @if($get['category'] == 0)
            class='active'
        @endif
        ><a href="{{url('index')}}"><b>首页</b></a></li>
        @foreach($types as $v)
            <li
            @if($get['category'] == $v->filmtypesListId)
                class='active'
            @endif
            ><a title='{{$v->chineseName}}' href="{{url('/')}}/{{$v->englishName}}/{{$v->filmtypesListId}}"><b>{{$v->chineseName}}</b></a></li>
        @endforeach
    </ul>
</div>

<!-- 手机左侧菜单栏 -->
<div id="mobileCountryMenu" class="mobileMenu visible-xs" isOpen='0'> 
    @if($get['category'] == config('TypesID.SOAPSID'))
        <ul>
            <li><a 
                @if($get['soapType'] == 0)
                    class='navDefault'
                @endif
                href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
            @foreach($soapType as $v)
                <li><a title='{{$v->chineseName}}'
                    @if($get['soapType'] == $v->filmtypesListId)
                    class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">{{$v->chineseName}}</a></li>
            @endforeach
        </ul>
    @elseif($get['category'] == config('TypesID.TVSHOWSID'))
        <ul>
            <li><a 
                @if($get['soapType'] == 0)
                    class='navDefault'
                @endif
                href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
            @foreach($tvType as $v)
                <li><a title='{{$v->chineseName}}'
                    @if($get['soapType'] == $v->filmtypesListId)
                    class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0"><h2>{{$v->chineseName}}</h2></a></li>
            @endforeach
        </ul>
    @elseif($get['category'] == config('TypesID.CARTOONSID'))
        <ul>
            <li><a 
                @if($get['soapType'] == 0)
                    class='navDefault'
                @endif
                href="{{asset('typeSearchMsg')}}/{{$get['category']}}/0/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
            @foreach($cartoonType as $v)
                <li><a title='{{$v->chineseName}}'
                    @if($get['soapType'] == $v->filmtypesListId)
                    class='navDefault'
                    @endif
                    href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$v->filmtypesListId}}/{{$get['country']}}/{{$get['filmtype']}}/{{$get['year']}}/0"><h2>{{$v->chineseName}}</h2></a></li>
            @endforeach
        </ul>
    
    @else
    <ul class="mobileContries">
        <li><a 
            @if($get['country'] == 0)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/0/{{$get['filmtype']}}/{{$get['year']}}/0">全部</a></li>
            
        @foreach($contries as $v)
            <li><a title='{{$v->chineseName}}'
            @if($get['country'] == $v->countryId)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$v->countryId}}/{{$get['filmtype']}}/{{$get['year']}}/0">{{$v->chineseName}}</a></li>
        @endforeach
    </ul>
    <ul id="film-types">
        <li><a 
            @if($get['filmtype'] == 0)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/0/{{$get['year']}}/0">全部</a></li>
        @foreach($filmtypes as $v)
            <li><a title='{{$v->chineseName}}'
            @if($get['filmtype'] == $v->filmtypesListId)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$v->filmtypesListId}}/{{$get['year']}}/0">{{$v->chineseName}}</a></li>
        @endforeach
    </ul>
    @endif
    <ul id="years">
        <li><a 
            @if($get['year'] == 0)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$get['filmtype']}}/0/0">全部</a></li>
        @foreach($years as $v)
            <li><a
            @if($get['year'] == $v)
                class='navDefault'
            @endif
            href="{{asset('typeSearchMsg')}}/{{$get['category']}}/{{$get['soapType']}}/{{$get['country']}}/{{$get['filmtype']}}/{{$v}}/0">{{$v}}</a></li>
        @endforeach
    </ul>
    
</div>

<!-- 手机搜索栏 -->
<div id="mobileSearch" isOpen='0'>
    <form action="/search" method="POST" class="navbar-form" role="search">
        @csrf
        <div class="form-group" >
            <input class="container" name="search" type="text" class="form-control" placeholder="电影名字...">
        </div>
    </form>  
</div>


    
    


 
  


