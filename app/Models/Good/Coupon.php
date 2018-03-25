<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Coupon
 *
 * @property int $id
 * @property string $title 标题
 * @property float $price 满多少
 * @property float $lessprice 减多少
 * @property int $nums 数量
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态：1正常，0关闭
 * @property int $delflag 删除状态：1正常，-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\CouponUser $yhquser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereLessprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Coupon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
    // 优惠券
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'coupon';

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

    // 关联商品评价
    public function yhquser()
    {
        return $this->hasOne('\App\Models\Good\CouponUser','c_id','id');
    }
}
