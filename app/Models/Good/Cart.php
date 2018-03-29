<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Cart
 *
 * @property int $id
 * @property string $session_id sessionId
 * @property int $user_id 用户ID
 * @property int $good_id 商品ID
 * @property string|null $good_title 商品名称
 * @property string|null $good_spec_key 商品规格key
 * @property string|null $good_spec_name 商品规格组合名称
 * @property int $nums 数量
 * @property float $old_price 原价
 * @property float $price 价格
 * @property float $total_prices 总价
 * @property int $selected 购物车选中状态
 * @property int $prom_type 0普通订单,1团购
 * @property int $prom_id 活动ID
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereGoodSpecKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereGoodSpecName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart wherePromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart wherePromType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereSelected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereTotalPrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    // 购物车
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'carts';

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
    public function good()
    {
        return $this->belongsTo('\App\Models\Good\Good', 'good_id', 'id');
    }

    public static function computedAllGoodPrice($users_id)
    {
        $data = static::whereUserId($users_id)->get();
        $result = ['num' => 0, 'total_price' => 0, 'id' => 0];
        $data->each(function (Cart $cart) use (&$result) {
            $result['num'] += $cart->nums;
            $result['total_price'] += $cart->total_prices;
            $result['id'] += $cart->id;
        });
        return $result;
    }

    /**
     * @param $users_id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public static function getCartByUserId($users_id)
    {
        return static::whereUserId($users_id)->get();
    }
}
