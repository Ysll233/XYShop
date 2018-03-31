<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\GoodSelect;
use App\Models\Common\Article;
use App\Models\Common\Cate;
use App\Models\Good\Brand;
use App\Models\Good\Cart;
use App\Models\Good\Coupon;
use App\Models\Good\Good;
use App\Models\Good\GoodAttr;
use App\Models\Good\GoodCate;
use App\Models\Good\GoodComment;
use App\Models\Good\GoodSpec;
use App\Models\Good\GoodSpecItem;
use App\Models\Good\GoodSpecPrice;
use App\Models\Good\Promotion;
use App\Models\Good\Timetobuy;
use App\Models\Good\Tuan;
use App\Models\Good\TuanUser;
use App\Models\User\UserCollect;
use Illuminate\Http\Request;
use App\Models\Good\Order;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
//        try {
//            $pos_id = 'home';
//            $title = '首页';
//            $wechat_js = app('wechat.official_account')->jssdk;
//            return view(cache('config')['theme'] . '.index', compact('pos_id', 'title', 'wechat_js'));
//        } catch (\Exception $e) {
//            dd($e);
//            return view('errors.404');
//        }

        return redirect('/catelist');
    }

    /*
    * 商品分类列表
    */
    public function getCatelist($id = 0)
    {
        try {
            $pos_id = 'catelist';
            // 所有一级分类
            $one = GoodCate::where('parentid', 0)->select('id', 'name', 'mobilename', 'thumb')
                ->orderBy('sort', 'asc')->orderBy('id', 'asc')
                ->get();
            if ($id == 0) {
                if ($one->isNotEmpty()) {
                    $id = $one[0]->id;
                }
            } else {

            }
            $cates = GoodCate::where('parentid', $id)->select('id', 'name', 'mobilename', 'thumb')->orderBy('sort', 'asc')->orderBy('id', 'asc')->get();
            $title = '商品分类';
            return view(cache('config')['theme'] . '.catelist', compact('pos_id', 'title', 'id', 'one', 'cates'));
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    // 商品列表
    public function getList(Request $req, $id = 0)
    {
        try {
            // 找出来所有栏目ID
            if ($id == 0) {
                $catids = GoodCate::pluck('id');
            } else {
                $catids = GoodCate::where('id', $id)->value('arrchildid');
                $catids = explode(',', $catids);
            }
            $catname = $id == 0 ? '全部商品' : GoodCate::where('id', $id)->value('mobilename');
            // 排序方式
            $sort = isset($req->sort) ? $req->sort : 'sort';
            $sc = isset($req->sc) ? $req->sc : 'desc';
            $list = Good::whereIn('cate_id', $catids)->where('status', 1)->select('id', 'title', 'shop_price', 'thumb', 'prom_type', 'is_new', 'is_pos', 'is_hot')->orderBy($sort, $sc)->orderBy('id', 'desc')->simplePaginate(20);
            $pos_id = 'home';
            $title = $catname;
            return view(cache('config')['theme'] . '.list', compact('pos_id', 'title', 'list', 'sort', 'sc'));
        } catch (\Exception $e) {
            dd($e);
            return view('errors.404');
        }
    }

    // 商品详情页面
    public function getGood($id = '')
    {
        try {
            // 分享用的
            $wechat_js = app('wechat.official_account')->jssdk;
            $good = Good::findOrFail($id);
            /*
            * 查出来所有的规格信息
            * 1、找出所有的规格ID 
            * 2，查出所有的规格ID对应的名字spec_item及spec内容
            * 3、循环出来所有的规格及规格值
            * */
            $good_spec_ids = GoodSpecPrice::where('good_id', $id)->pluck('item_id')->toArray();
            $good_spec_ids = explode('_', implode('_', $good_spec_ids));
            $good_spec = GoodSpecItem::with(['goodspec' => function ($q) {
                $q->select('id', 'name');
            }])->whereIn('id', $good_spec_ids)->get();
            $filter_spec = [];
            foreach ($good_spec as $k => $v) {
                $filter_spec[$v->goodspec->name][] = ['item_id' => $v->id, 'item' => $v->item];
            }
            // 查出第一个规格信息来，标红用的
            $good_spec_price = GoodSpecPrice::where('good_id', $id)->get()->keyBy('item_id')->toJson();
            // 找出来可以用的优惠券
            $date = date('Y-m-d H:i:s');
            $coupon = Coupon::where('starttime', '<=', $date)->where('endtime', '>=', $date)->where('delflag', 1)->where('status', 1)->orderBy('sort', 'desc')->orderBy('id', 'desc')->limit(3)->get();
            $title = $good->title;
            $keyword = $good->keyword;
            $describe = $good->describe;
            return view(cache('config')['theme'] . '.good', compact('title', 'keyword', 'describe', 'good', 'good_spec_price', 'filter_spec', 'coupon', 'wechat_js'));
        } catch (\Exception $e) {
            // dd($e);
            return view('errors.404');
        }
    }

    // 搜索
    public function getSearch(Request $req)
    {
        try {
            // 排序方式
            $sort = isset($req->sort) ? $req->sort : 'sort';
            $sc = isset($req->sc) ? $req->sc : 'desc';
            $list = Good::where('title', 'like', "%" . $req->key . "%")->where('status', 1)->select('id', 'title', 'shop_price', 'thumb', 'prom_type', 'is_new', 'is_pos', 'is_hot')->orderBy($sort, $sc)->orderBy('id', 'desc')->simplePaginate(20);
            $pos_id = 'home';
            $title = "搜索结果";
            return view(cache('config')['theme'] . '.list', compact('pos_id', 'title', 'list', 'sort', 'sc'));
        } catch (\Exception $e) {
            // dd($e);
            return view('errors.404');
        }
    }

    public function getCategoryGood(GoodCate $cate)
    {
        $users_id = session()->get('member')->id;
        $goods = Good::whereCateId($cate->id)
            ->where('status', 1)
            ->where('prom_type', 0)
            ->orderBy('sort', 'asc')
            ->paginate(20);
        $data = [];
        foreach ($goods->items() as $item) {
            $temp = [
                'id' => $item->id,
                'shop_price' => $item->shop_price,
                'title' => $item->title,
                'keyword' => $item->keyword,
                'thumb' => $item->thumb,
                'num' => 0,
            ];
            $userCartGood = Cart::whereUserId($users_id)->where('good_id', $item->id)->first();
            if (!empty($userCartGood)) {
                $temp['num'] = $userCartGood->nums;
                $temp['id'] = $userCartGood->id;
            }
            $classfly = GoodCate::where('id', $item->cate_id)->first();

            $collect = UserCollect::whereUsersId($users_id)->where('goods_id', $item->id)->first();

            if (empty($collect)) {
                $temp['is_collect'] = false;
            } else {
                $temp['is_collect'] = true;
            }

            $temp['cate_name'] = $classfly->name;
            array_push($data, $temp);
        }
        return ['success' => true, 'data' => [
            'current_page' => $goods->currentPage(),
            'last_page' => $goods->lastPage(),
            'total' => $goods->total(),
            'data' => $data,
            'cart' => Cart::computedAllGoodPrice($users_id),
            'cid' => Cart::getCartByUserId($users_id)->pluck('id')
        ]];
    }

    public function getCartId()
    {
        $users_id = session()->get('member')->id;
        $ids = Cart::getCartByUserId($users_id)->pluck('id');
        if ($ids->isEmpty()) {
            return ['success' => false, 'data' => '购物车是空的'];
        }
        return ['success' => true, 'data' => $ids];

    }
}