<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\OrderGood
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $order_id 订单ID
 * @property int $good_id 商品ID
 * @property string|null $good_title 商品名称
 * @property string|null $good_spec_key 商品规格key
 * @property string|null $good_spec_name 商品规格组合名称
 * @property int $nums 数量
 * @property float $old_price 原单价
 * @property float $price 价格
 * @property float $total_prices 总价
 * @property int $commentstatus 评价状态
 * @property int $prom_type 0普通订单,1团购
 * @property int $prom_id 活动ID
 * @property int $shipstatus 0未发货，1已发货，2已换货，3已退货
 * @property int $status 状态，1正常0删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @property-read \App\Models\Good\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereCommentstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereGoodSpecKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereGoodSpecName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood wherePromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood wherePromType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereShipstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereTotalPrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\OrderGood whereUserId($value)
 * @mixin \Eloquent
 */
class OrderGood extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'order_goods';

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

    // 关联商品
    public function order()
    {
        return $this->belongsTo('\App\Models\Good\Order','order_id','id');
    }
    // 关联商品
    public function good()
    {
        return $this->belongsTo('\App\Models\Good\Good','good_id','id');
    }
}
