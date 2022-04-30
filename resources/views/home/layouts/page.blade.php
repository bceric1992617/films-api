            <ul class='pagination'>
                @if($nowPage > 0)  
                    <li><a href="{{$nowPage-1}}"> << </a></li>
                @endif

                @if($count < $pageLimit)
                    @for($i = 0; $i <= $count; $i++)
                        <li><a href="{{$i}}">{{$i+1}}</a></li>
                    @endfor
                @else
                    @if(($count-$nowPage) > $pageLimit)
                        @for($i = $nowPage ; $i <= ($pageLimit + $nowPage); $i++)
                            <li><a href="{{$i}}">{{$i+1}}</a></li>
                        @endfor
                    @else
                        @for($i = $nowPage - ($pageLimit - ($count-$nowPage)) ; $i <= ($pageLimit + ($nowPage - ($pageLimit - ($count-$nowPage)))); $i++)
                            <li><a href="{{$i}}">{{$i+1}}</a></li>
                        @endfor
                    @endif
                @endif
                
                @if($count != ($nowPage))
                    <li><a href="{{$nowPage+1}}"> >> </a></li>
                @endif
            </ul>