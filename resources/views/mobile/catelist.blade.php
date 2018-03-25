@extends('mobile.layout')

@section('css')
    <style>
        ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 5px;
            height: 0;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: rgba(0, 0, 0, .5);
            -webkit-box-shadow: 0 0 1px rgba(115, 213, 116, .5);
        }

        ::selection {
            background: #d3d3d3;
            color: #555;
        }

        ::selection {
            background: #1ccdca;
            color: #fff;
            text-shadow: none;
        }
        .show-case-bar {
            position: relative;
            width: 100%;
            height: 100%;
            transition-duration: 0ms;
            transform: translate3d(0px, 0px, 0px);
            transition-property: transform,-webkit-transform;
            display: flex;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch
        }

        .show-case-bar-item {
            display: inline-block;
            overflow: hidden;
            flex-shrink: 0;
            position: relative;
            /*border: 1px solid #00a0e9;*/
            line-height: 30px;
            padding: 0 15px;
            font-size: 14px;
            transition-property: transform;
        }
        .show-case-bar-item:first-child {
        }
    </style>
@endsection

@section('content')
    @component('mobile.common.search',['issub'=>1])
    @endcomponent
    <section class="clearfix list_cate overh">
        <ul class="show-case-bar">
            @if(!empty($cates) && isset($cates[0]))
                @foreach(app('tag')->catelist($cates[0]->id, 99) as $g)
                    <li class="show-case-bar-item">{{$g->mobilename}}</li>
                @endforeach
            @endif
        </ul>
        <ul class="l_c_left bgc_f f-l">
            @foreach($one as $o)
                <li @if($o->id == $id) class="active"@endif><a
                            href="{{ url('catelist',['id'=>$o->id]) }}">{{ $o->mobilename }}</a></li>
            @endforeach
        </ul>
        <div class="md-product">
        </div>
    </section>
    @include('mobile.common.footer')
    @include('mobile.common.pos_menu')
@endsection


@section('js')
@endsection