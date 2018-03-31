<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User\User;
use App\Models\User\UserCollect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCollectController extends Controller
{
    public function index()
    {
        $user_id = session()->get('member')->id;

        $user = User::whereId($user_id)->first();

        if (empty($user)) {
            return view('errors.404');
        }

        $collects = $user->collect()->paginate(20);

        $title = 'User Collect';

        $pos_id = 'collect';

        return view('mobile.collect', compact('collects', 'title', 'pos_id'));
    }


    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), ['goods_id' => 'required|exists:goods,id|integer']);
        if ($v->fails()) {
            return ['code' => -10000, 'success' => false, 'data' => '产品不存在'];
        }

        $users_id = session()->get('member')->id;
        $goods_id = $request->get('goods_id');
        $collect = UserCollect::whereUsersId($users_id)->where('goods_id', $goods_id)->first();
        if (!empty($collect)) {
            return ['code' => 1000, 'success' => false, 'data' => '已收藏'];
        }

        UserCollect::create(['users_id' => $users_id, 'goods_id' => $goods_id]);
        return ['code' => 0, 'success' => true, 'data' => '收藏成功'];
    }

    public function show(UserCollect $collect)
    {
        return ['code' => 0, 'success' => true, 'data' => $collect];
    }

    public function update(Request $request, UserCollect $collect)
    {
        // TODO 不需要的方法
    }

    public function destroy(UserCollect $collect)
    {
        try {
            if ($collect->delete()) {
                return ['code' => 0, 'success' => true, 'data' => '删除成功'];
            }
        } catch (\Exception $e) {
        }
        return ['code' => 1000, 'success' => false, 'data' => $e->getMessage()];
    }

    public function unCollect($goods_id)
    {
        $users_id = session()->get('member')->id;
        $userCollect = UserCollect::whereUsersId($users_id)->where('goods_id', $goods_id)->first();
        if (empty($userCollect)) {
            return response('', 404);
        }
        return $this->destroy($userCollect);
    }
}
