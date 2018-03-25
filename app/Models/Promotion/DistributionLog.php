<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\DistributionLog
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $son_id 子级ID
 * @property int $sun_id 孙级ID
 * @property int $order_id 订单ID
 * @property float $money 金额
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\User $son
 * @property-read \App\Models\User\User $sun
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereSonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereSunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionLog whereUserId($value)
 * @mixin \Eloquent
 */
class DistributionLog extends Model
{
    // 分成记录
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'distribution_logs';

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
    // 子级
    public function son()
    {
        return $this->belongsTo('\App\Models\User\User','son_id','id');
    }
    // 孙级
    public function sun()
    {
        return $this->belongsTo('\App\Models\User\User','sun_id','id');
    }
}
