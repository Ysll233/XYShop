<?php

namespace App\Models\User;

use App\Models\Good\Good;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserCollect
 *
 * @property int $id
 * @property int $goods_id
 * @property int $users_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserCollect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserCollect whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserCollect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserCollect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserCollect whereUsersId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Good\Good $good
 * @property-read \App\Models\User\User $user
 */
class UserCollect extends Model
{
    protected $fillable = ['goods_id', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function good()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }
}
