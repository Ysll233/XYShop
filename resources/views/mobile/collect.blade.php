@extends('mobile.layout')

@section('css')
    <style>
        .clear {
            clear:both;
        }
        div {
            margin-top: 1.5rem;
            padding: 10px;
        }
        div img {
            float: right;
            width: 30%;
        }
        div p {
            float: left;
            width: 65%;
        }
        div i {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    @component('mobile.common.search',['issub'=>1]) @endcomponent

    <div>
        @foreach($collects->items() as $item)
            <?php $good = $item->good;?>
<!--        --><?php //dd($item); ?><!--;-->
        <a href="good/{{$good->id}}">
            <img src= "{{$good-> thumb}}" />
            <p>{{$good->title ?? 'error'}}</p>
        </a>
            <div class="delete">
        <i class="fa fa-times-circle fa-2x" data-id="{{$item->id}}"></i>
            </div>
        <div class="clear"></div>
        @endforeach()
    </div>
    @include('mobile.common.pos_menu')
@endsection


@section('js')
    <script>
        // 删除购物车
        $('.fa-times-circle').click(function(e){
            let data = e.target;
            let id = data.getAttribute('data-id');
            $.post(host+'api/good/removecart',{id:id},function(d){
                let ss = jQuery.parseJSON(d);
                if (ss.code === 1) {
                    // 重新取购物车数量，计算总价
                    // 删除对应的结构
                    $('.fa-times-circle' + id).remove();
                    cartnum(uid);
                    $('.alert_msg').text(ss.msg).slideToggle().delay(1500).slideToggle();
                }
                else
                {
                    $('.alert_msg').text(ss.msg).slideToggle().delay(1500).slideToggle();
                }
                return;
            }).error(function() {
                return;
            });
        });
    </script>
@endsection