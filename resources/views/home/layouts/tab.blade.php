
@if($isDetail)
    <div class="playList">
        <ul id="myTab" class="tabclass nav nav-tabs">
            <li class='active'><a href="#m3u8" data-toggle="tab">在线1</a></li>
            <li><a href="#kuyun" data-toggle="tab">在线2</a></li>
            
        </ul>
        <br/>   
        <div id="myTabContent" class="tab tab-content">
            <div class='tab-pane fade in active' id="m3u8">
                <ul>  
                    @if(empty($m3u8PlayAddr[0]))
                        没有播放信息。。。。
                    @else
                        @foreach($m3u8PlayAddr as $v)  
                            <li><a href="{{asset('play')}}/{{$v->filmsId}}-{{$v->playAddrId}}-m">{{$v->playAddrName}}</a></li>
                        @endforeach
                    @endif          
                </ul>
            </div>
            <div class='tab-pane fade' id="kuyun">

                <ul>  
                    @if(empty($kuyunPlayAddr[0]))
                        没有播放信息。。。。
                    @else
                        @foreach($kuyunPlayAddr as $v)  
                            <li><a href="{{asset('play')}}/{{$v->filmsId}}-{{$v->playAddrId}}-k">{{$v->playAddrName}}</a></li>
                        @endforeach
                    @endif          
                </ul>
            </div>
            <!-- <div class="tab-pane fade" id="download">
                @if(empty($magnetLink[0]))
                    没有下载连接。。。。
                @else
                    @foreach($magnetLink as $v)
                        <p class='downLoadLink'>{{$v->linkName}}<br><a class="magnetLink" 
                            @if(strstr($v->downLink, 'http://'))
                                {{'href=thunder://'. base64_encode('AA'. $v->downLink .'ZZ')}}
                            @else
                                {{'href='.$v->downLink}}
                            @endif
                        thunderResTitle="迅雷下载" thunderType="04" thunderPid="00008">{{$v->downLink}}</a></p>
                    @endforeach
                @endif
            </div> -->
        </div>
    </div>
@else
    <div class="playList">
        <ul id="myTab" class="tabclass nav nav-tabs">
            <li
                @if(explode('-',$get['id'])[2] == 'm')
                    class='active'
                @endif
            ><a href="#m3u8" data-toggle="tab">在线1</a></li>
            <li 
                @if(explode('-',$get['id'])[2] == 'k')
                    class='active'
                @endif
            ><a href="#kuyun" data-toggle="tab">在线2</a></li>
            
        </ul>
        <br/>
        <div id="myTabContent" class="tab tab-content">
            <div 
                @if(explode('-',$get['id'])[2] == 'm')
                    class='tab-pane fade in active'
                @else
                    class='tab-pane fade'
                @endif
            id="m3u8">
                <ul>  
                    @if(empty($m3u8PlayAddr[0]))
                        没有播放信息。。。。
                    @else
                        @foreach($m3u8PlayAddr as $v)  
                            <li><a href="{{asset('play')}}/{{$v->filmsId}}-{{$v->playAddrId}}-m">{{$v->playAddrName}}</a></li>
                        @endforeach
                    @endif          
                </ul>
            </div>
            <div 
                @if(explode('-',$get['id'])[2] == 'k')
                    class='tab-pane fade in active'
                @else
                    @if(empty($isDetail))
                        class='tab-pane fade'
                    @else
                        class='tab-pane fade in active'
                    @endif
                @endif

            id="kuyun">

                <ul>  
                    @if(empty($kuyunPlayAddr[0]))
                        没有播放信息。。。。
                    @else
                        @foreach($kuyunPlayAddr as $v)  
                            <li><a href="{{asset('play')}}/{{$v->filmsId}}-{{$v->playAddrId}}-k">{{$v->playAddrName}}</a></li>
                        @endforeach
                    @endif          
                </ul>
            </div>
        </div>
    </div>
@endif

        

        
        