<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Order
 *
 * @property int $id
 * @property string $order_id 订单ID
 * @property int $user_id 用户ID
 * @property int $tuan_id 团购ID
 * @property string|null $t_orderid 开团号
 * @property int $address_id 送货地址
 * @property int $yhq_id 优惠券id
 * @property float $yh_price 优惠券金额
 * @property float $old_prices 原价
 * @property float $total_prices 总价
 * @property string $create_ip 创建IP
 * @property int $paystatus 支付状态,0未，1已
 * @property string|null $pay_name 支付方式
 * @property string|null $paytime 支付时间
 * @property int $shipstatus 发货状态,0未，1已
 * @property string|null $ship_at 发货时间
 * @property string|null $area 区域
 * @property int $ziti 自提点
 * @property string|null $mark 用户备注
 * @property string|null $shopmark 商家备注
 * @property int $orderstatus 订单状态，1正常2完成0关闭
 * @property string|null $confirm_at 确认收货时间
 * @property int $prom_type 类型：0正常，1抢，2团
 * @property int $display 是否显示：1显示，0不显示
 * @property int $status 状态，1正常0删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\Address $address
 * @property-read \App\Models\Good\Extract $extract
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\OrderGood[] $good
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\ReturnGood[] $return
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereConfirmAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereCreateIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereOldPrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereOrderstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order wherePayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order wherePaystatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order wherePaytime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order wherePromType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereShipAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereShipstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereShopmark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereTOrderid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereTotalPrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereTuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereYhPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereYhqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Order whereZiti($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
	// 订单表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'orders';

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
    
    // 商品
    public function good()
    {
        return $this->hasMany('\App\Models\Good\OrderGood','order_id','id');
    }
    public function address()
    {
        return $this->belongsTo('\App\Models\User\Address','address_id','id');
    }
    public function extract()
    {
        return $this->belongsTo('\App\Models\Good\Extract','ziti','id');
    }
    public function user()
    {
        return $this->belongsTo('\App\Models\User\User','user_id','id');
    }
    // 退货单
    public function return()
    {
        return $this->hasMany('\App\Models\Good\ReturnGood','order_id','id');
    }
}
