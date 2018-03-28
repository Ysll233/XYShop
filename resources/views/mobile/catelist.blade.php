@extends('mobile.layout')

@section('css')
@endsection

@section('content')
    @component('mobile.common.search',['issub'=>1])
    @endcomponent
    <section class="clearfix list_cate overh" style="overflow-y:visible">
        <div class="top-category">
            <i>&larrhk;</i>
            <ul class="show-case-bar">
                @if(!empty($cates) && isset($cates[0]))
                    @foreach(app('tag')->catelist($cates[0]->id, 99) as $g)
                        <li class="show-case-bar-item" data-id="{{$g->id}}" data-name="category_{{$g->id}}">
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
        <div class="md-product" style="overflow-y: auto;height: 570px;">
            <ul class="product_ul" >
            </ul>
        </div>
    </section>
    @include('mobile.common.pos_menu')
@endsection


@section('js')
    <script>
        let products = null;
        let sid = "{{ session()->getId() }}";
        let categoryId = null;
        let isLoadMore = false;
        $(document).ready(function () {
            initCategoryGood();
            $('.show-case-bar').delegate('li', 'click', function (e) {
                let li = e.target;
                let id = li.getAttribute('data-id');
                getCategoryGood(id);
            });
            $('.product_ul').delegate('button', 'click', function (e) {
                let el = $(e.target);
                let type = el.attr('data-type');
                switch (type) {
                    case 'add': addBuyNum(el);break;
                    case 'remove': removeBuyNum(el); break;
                }
            });
            $('.md-product').scroll(function (e) {
                let el = $(this);
                let ul = $('.product_ul');
                if (ul.height() - 10 < el.scrollTop() + el.height()) {
                    if (isLoadMore === false) {
                        console.info('bottom');
                        isLoadMore = true;
                        let page = products.current_page + 1;
                        if (page > products.last_page ) return;
                        $.get('/category/good/' + categoryId, {page: page}, function (res) {
                            if (res.success !== true) return;
                            addProduct(res.data);
                            isLoadMore = false;
                        });
                    }
                }
            })
        });

        function initCategoryGood () {
            let id = $('.show-case-bar li:first-child').attr('data-id');
            if (id !== null && id !== undefined) {
                getCategoryGood(id);
            }
        }

        function getCategoryGood (id) {
            $('.show-case-bar li').removeClass('active');
            products = null;
            $(`li[data-name="category_${id}"]`).addClass('active');
            $.get('/category/good/' + id, function (res) {
                if (res.success !== true) return;
                addProduct(res.data);
                categoryId = id;
            });
        }

        function addProduct (data) {
            if (products === null) {
                products = data;
            } else {
                products.data = products.data.concat(data.data);
                products.current_page = data.current_page;
                products.last_page = data.last_page;
            }
            let html = '';
            $.each(products.data, function (index, item) {
                html +=
`<li class="product_li" data-id="${item.id}" data-price="${item.shop_price}">
    <a class="product_link">
        <div class="product-info">
            <p class="product_title">${item.title}</p>
            <p><span class="iconfont">￥${item.shop_price}</span>/${item.keyword}</p>
        </div>
        <img src="${item.thumb}">
    </a>
    <div class="product-action">
        <button data-type="add">+</button>
        <span>${item.num}</span>
        <button data-type="remove">-</button>
    </div>
</li>`
            });
            $('.product_ul').html(html)
        }

        function  addBuyNum (el) {
            let span = el.next();
            let num = parseInt(span.text());
            if (isNaN(num)) {
                num = 0;
            }
            num++;
            let li = el.parents('li');
            let gid = li.attr('data-id');
            let price = li.attr('data-price');
            addCartGood(gid, num, price, function () {
                span.text(num);
            });
        }
        function  removeBuyNum (el) {
            let span = el.prev();
            let num = parseInt(span.text());
            if (isNaN(num)) {
                num = 0;
            }
            if (num <= 0) {
                return
            }
            num--;
            span.text(num);
        }

        function addCartGood (gid, num, price, callback) {
            $.post('/api/good/addcart', {
                gid: gid,
                spec_key: '',
                num: num,
                gp: price,
                sid: sid,
                uid: uid
            } ,function (res) {
                callback(res);
            })
        }
    </script>
@endsection