@extends('mobile.layout')

@section('css')
@endsection

@section('content')
    @component('mobile.common.search',['issub'=>1])
    @endcomponent
    <section class="clearfix list_cate overh">
        <div class="top-category">
            <i>&larrhk;</i>
            <ul class="show-case-bar">
                @if(!empty($cates) && isset($cates[0]))
                    @foreach(app('tag')->catelist($cates[0]->id, 99) as $g)
                        <li class="show-case-bar-item" data-id="{{$g->id}}">
                            {{$g->mobilename}}
                        </li>
                    @endforeach
                @endif
            </ul>
            <i>&rarrhk;</i>
        </div>
        <ul class="l_c_left f-l category_list">
            @foreach($one as $o)
                <li @if($o->id == $id) class="active"@endif>
                    <a href="{{ url('catelist',['id'=>$o->id]) }}">{{ $o->mobilename }}</a>
                </li>
            @endforeach
        </ul>
        <div class="md-product">
            <ul class="product_ul">
                <li class="product_li">
                    <a href="#" class="product_link">
                        <div class="product-info">
                            <p class="product_title">绿鲜知 上海青 小油菜 约400g 火锅涮菜 新鲜蔬菜</p>
                            <p><span class="iconfont">￥550</span>/1000克</p>
                        </div>
                        <img src="http://img10.360buyimg.com/n7/s230x230_jfs/t4297/120/375562832/241785/c162c78b/58b3c779Na1ec50a0.jpg!cc_230x230.jpg">
                    </a>
                    <div class="product-action">
                        <button>+</button>
                        <span>0</span>
                        <button>-</button>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    @include('mobile.common.footer')
    @include('mobile.common.pos_menu')
@endsection


@section('js')
    <script>
        var products = null;
        $(document).ready(function () {
            $('.show-case-bar').delegate('li', 'click', function (e) {
                var li = e.target;
                var id = li.getAttribute('data-id');
                getCategoryGood(id);
            });
        });

        function getCategoryGood (id) {
            products = null;
            $.get('/category/good/' + id, function (res) {
                if (res.success !== true) return;
                addProduct(res.data);
            });
        }

        function addProduct (data) {
            console.info(data);
            if (products === null) {
                products = data;
            } else {
                products.data = products.data.concat(data.data);
                products.current_page = data.current_page;
                products.last_page = data.last_page;
            }
            var html = '';
            $.each(products.data, function (index, item) {
                html += ''
            });
        }
    </script>
@endsection