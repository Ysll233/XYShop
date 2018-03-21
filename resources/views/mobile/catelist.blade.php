@extends('mobile.layout')

@section('content')

  <!-- 搜索 -->
  @component('mobile.common.search',['issub'=>1])
  @endcomponent
  <!-- 分类列表 -->
  <section class="clearfix list_cate overh">
    <div class="box1">
      <div class="wrap">
        <ul>
          <li>1移动端</li>
          <li>2可滑动</li>
          <li>3ie8以上</li>
          <li>4</li>
          <li>5</li>
        </ul>
      </div>
    </div>
    <ul class="l_c_left bgc_f f-l">
      @foreach($cates as $o)
      <li @if($o->id == $id) class="active"@endif><a href="{{ url('catelist',['id'=>$o->id]) }}">{{ $o->mobilename }}</a></li>
      @endforeach
    </ul>
    <div class="l_c_right f-r pd20">
      <!-- ad -->

      
      <!-- 按二级分类再循环 -->
      @foreach($cates as $c)
      <div class="pd20 mt20 bgc_f">

        <ul class="l_c_subcate clearfix">
          @foreach(app('tag')->catelist($c->id,8) as $g)
          <li>
            @if($g->thumb != '')
            <a href="{{ url('list',['id'=>$g->id]) }}" class="l_c_s_img db_ma"><img data-original="{{ $g->thumb }}" width="70" height="70" alt="{{ $g->mobilename }}" class="lazy"></a>
            @endif
            <a href="{{ url('list',['id'=>$g->id]) }}" class="l_c_s_title">{{ $g->mobilename }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      @endforeach
    </div>
  </section>
  <style>
    .box1 {
      overflow:hidden;
      /* 超出隐藏滚动条 */
      background-color:#fff;
    }
    .box1 .wrap {
      /* 比里层元素高16px 为了隐藏滚动条*/
      overflow-x:scroll;
      /* 定义超出此盒子滚动 */
      overflow-y:hidden;
    }
    .box1 .wrap ul {
      width:640px;
      display:flex;
    }
    .box1 .wrap ul li {
      flex:1;
      width:60px;
      box-sizing:border-box;
      padding: 10px;
    }
    .box1::-webkit-scrollbar {display:none}
  </style>
  <!-- 底 -->
  @include('mobile.common.footer')
  <!-- 公用底 -->
  @include('mobile.common.pos_menu')
@endsection