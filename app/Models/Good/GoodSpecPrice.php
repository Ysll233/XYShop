<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\GoodSpecPrice
 *
 * @property string $good_id 商品id
 * @property string $item_id 规格键名，good_spec_item表的ID
 * @property string $item_name 规格键名中文，good_spec_item表的item
 * @property float $price 价格
 * @property int $store 库存
 * @property int $sales 销量
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereItemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodSpecPrice extends Model
{
    // 商品规格价格库存表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'good_spec_price';

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


    // 关联商品分类表
    public function good()
    {
        return $this->belongsTo('\App\Models\Good\Good','good_id','id');
    }
}
