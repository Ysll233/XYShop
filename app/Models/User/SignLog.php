<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\SignLog
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $point 积分数变化
 * @property int $type 1增加，0消费，2下单送
 * @property int $days 累计天数
 * @property string|null $signtime 签到日期
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog whereSigntime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignLog whereUserId($value)
 * @mixin \Eloquent
 */
class SignLog extends Model
{
    // 签到记录
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'user_sign_logs';

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
    public $timestamps = false;
}
