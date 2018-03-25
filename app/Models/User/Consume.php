<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Consume
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $order_id 订单ID
 * @property string $price 金额
 * @property int $type 类型，0消费 1充值
 * @property string $mark 备注
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Consume whereUserId($value)
 * @mixin \Eloquent
 */
class Consume extends Model
{
    // 消费记录
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'consume';

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
