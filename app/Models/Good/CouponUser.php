<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\CouponUser
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $c_id 优惠券ID
 * @property string|null $endtime 结束时间
 * @property int $status 状态：1正常，0已用
 * @property int $delflag 删除状态：1正常，-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Coupon $coupon
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereCId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\CouponUser whereUserId($value)
 * @mixin \Eloquent
 */
class CouponUser extends Model
{
    // 用户优惠券
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'coupon_user';

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

    // 关联商品优惠券
    public function coupon()
    {
        return $this->belongsTo('\App\Models\Good\Coupon','c_id','id');
    }
}
