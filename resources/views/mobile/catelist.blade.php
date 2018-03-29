@extends('mobile.layout')

@section('css')
    <style>
        html body {
            overflow: auto !important;
            height: 100%;
        }
        .md-container {
            padding-top: 1.3333rem;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
        .md-content {
            display: flex;
            position: absolute;
            height: calc(100% - 1.3333rem - 2.5rem);
            width: 100%;
        }
        .md-content .category_list{
            width: 85px;
            overflow-y: auto;
        }
        .md-content .md-product{
            width: 100%;
            flex: 1;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    @component('mobile.common.search',['issub'=>1]) @endcomponent
    <section class="md-container">
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
        <div class="md-content">
            <ul class="category_list">
                @foreach($one as $o)
                    <li @if($o->id == $id) class="active"@endif>
                        <a href="{{ url('catelist',['id'=>$o->id]) }}">{{ $o->mobilename }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="md-product">
                <ul class="product_ul"></ul>
                <div class="pos_foot pos_foot_cart product_result">
                    <span class="cart_prices color_main">总额：￥<em class="cart_prices_num font_lg" id="total_price">0</em></span>
                    <span class="show_btn_tosubmit">去结算<span class="font_sm">(<i class="cart_total_nums" id="total_num">0</i>件)</span></span>
                </div>
            </div>
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
            });
            $('.show_btn_tosubmit').on('click', function () {
                $.get('/cart/id', function (res)  {
                    if (res.success !== true) return;
                    let cid = '';
                    $.each(res.data, function (index, item) {
                        cid += item + '.';
                    });
                    $.post('/createorder', {cid: cid}, function (res) {
                        res = jQuery.parseJSON(res);
                        if (res.code === 1) {
                            $('.alert_msg').text('提交成功！').slideToggle().delay(1500).slideToggle();
                            setTimeout(function(){
                                window.location.href = "{{ url('createorder') }}" + "?rid=" + res.msg;
                            },1500);
                        }
                        else
                        {
                            $('.alert_msg').text(res.msg).slideToggle().delay(1500).slideToggle();
                        }
                    })
                })
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
                showCartData(res.data.cart);
                categoryId = id;
            });
        }

        function showCartData (data) {
            $('#total_num').text(data.num);
            $('#total_price').text(data.total_price);
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
            <p><span>￥${item.shop_price}</span>/${item.keyword}</p>
            <i class="fab fa-gratipay fa-2x" style="padding-top:5px;"></i>
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
            addCartGood(gid, 1, price, function () {
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
            let li = el.parents('li');
            let gid = li.attr('data-id');
            let price = li.attr('data-price');
            addCartGood(gid,-1,price, function () {
                span.text(num);
            })
        }

        function addCartGood (gid, num, price, callback) {
            $.post('/api/good/addcart', {
                gid: gid,
                spec_key: '',
                num: num,
                gp: price,
                sid: sid,
                uid: uid,
            } ,function (res) {
                if (res.code === 1) {
                    callback(res);
                    showCartData(res.cart);
                }
                $('.alert_msg').text(res.msg).slideToggle().delay(1500).slideToggle();
            })
        }
    </script>
@endsection