<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Recharge
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property string $order_id 充值订单ID
 * @property float $money 充值金额
 * @property string $paymod 支付方式
 * @property int $paystatus 0未支付，1已支付
 * @property string|null $paytime 支付时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge wherePaymod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge wherePaystatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge wherePaytime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Recharge whereUserId($value)
 * @mixin \Eloquent
 */
class Recharge extends Model
{
    // 充值记录
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'recharge';

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
