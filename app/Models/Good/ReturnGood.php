<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\ReturnGood
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $order_id 订单ID
 * @property int $good_id 商品ID
 * @property string|null $good_title 商品名称
 * @property string|null $good_spec_key 商品规格key
 * @property string|null $good_spec_name 商品规格组合名称
 * @property string $mark 用户备注
 * @property string $shopmark 商家备注
 * @property int $nums 数量
 * @property float $price 价格
 * @property float $total_prices 总价
 * @property int $status 状态，0未退1退2不同意
 * @property int $delflag 删除状态，1正常-1删除
 * @property string $return_time 退货时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @property-read \App\Models\Good\Order $order
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereGoodSpecKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereGoodSpecName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereReturnTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereShopmark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereTotalPrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\ReturnGood whereUserId($value)
 * @mixin \Eloquent
 */
class ReturnGood extends Model
{
    // 退货管理
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'return_good';

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
    // 商品
    public function good()
    {
        return $this->belongsTo('\App\Models\Good\Good','good_id','id');
    }
    // 订单
    public function order()
    {
        return $this->belongsTo('\App\Models\Good\Order','order_id','id');
    }
}
