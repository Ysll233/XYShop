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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(UserCollect $collect)
    {
        //
    }

    public function edit(UserCollect $collect)
    {
        //
    }

    public function update(Request $request, UserCollect $collect)
    {
        //
    }

    public function destroy(UserCollect $collect)
    {
        try {
            if ($collect->delete()) {
                return ['code' => 0, 'massage' => '删除成功'];
            }
        } catch (\Exception $e) {}
        return ['code' => 2, 'massage' => ''];
    }
}
