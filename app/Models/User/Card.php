<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Card
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property string $card_id 会员卡号
 * @property string $card_pwd 会员卡密码
 * @property float $price 金额
 * @property int $status 状态，0未用 1已用
 * @property string $init_time 使用时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereCardPwd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereInitTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Card whereUserId($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    // 会员卡
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'cards';

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = true;

    // 用户
    public function user()
    {
        return $this->belongsTo('\App\Models\User\User','user_id','id');
    }
}
